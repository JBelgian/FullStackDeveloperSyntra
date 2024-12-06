// Import the Express framework for creating the server
const express = require('express');

// Import the CORS middleware to handle cross-origin resource sharing
const cors = require('cors');

// Load environment variables from a .env file into process.env
require('dotenv').config();

// Import the database connection
const db = require('./config/database');

// Create an Express application instance
const app = express();

// Set the port from the environment variable `PORT`, or default to 3000
const PORT = process.env.PORT || 3000;

// Middleware configuration for handling CORS (Cross-Origin Resource Sharing)
const corsOptions = {
    origin: [ // List of allowed origins for CORS requests
        'http://localhost:4000', 
        'http://localhost:3000',
        'http://localhost:5173',
        'https://yourproduction.com'
    ],
    methods: ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'], // Allowed HTTP methods
    allowedHeaders: ['Content-Type', 'Authorization', 'x-api-key'], // Allowed headers in requests
    credentials: true, // Allow credentials (cookies, HTTP authentication, etc.)
    optionsSuccessStatus: 200 // Send a 200 status for preflight (OPTIONS) requests
};

// Apply the CORS middleware using the defined options
app.use(cors(corsOptions));

// Middleware to parse incoming JSON requests into `req.body`
app.use(express.json({limit: '50mb'}));

// Middleware to parse incoming URL-encoded data (e.g., form submissions)
app.use(express.urlencoded({ extended: true, limit: '50mb' }));

// API key middleware
const API_KEY = 'your-secret-api-key-2024'; // In production, use environment variables

const authenticateApiKey = (req, res, next) => {
    const apiKey = req.headers['x-api-key'];
    
    if (!apiKey || apiKey !== API_KEY) {
        return res.status(401).json({ message: 'Invalid or missing API key' });
    }
    
    next();
};

// Apply API key middleware to all /api routes
app.use('/api', authenticateApiKey);

// Mount routes for handling `/api/courses` requests using a separate routes file
app.use('/api/courses', require('./routes/courses'));

// Image upload endpoint
app.post('/api/uploadimage', async (req, res) => {
    try {
        const { image } = req.body;

        // Insert the image into the database
        const [result] = await db.execute(
            'INSERT INTO images (image) VALUES (?)',
            [image]
        );

        res.status(200).json({ 
            message: 'Image uploaded successfully',
            id: result.insertId 
        });
    } catch (error) {
        console.error('Error uploading image:', error);
        res.status(500).json({ message: 'Error uploading image' });
    }
});

// Error handling middleware for catching errors and sending a generic response
app.use((err, req, res, next) => {
  console.error(err.stack); // Log the error stack trace to the console
  res.status(500).json({ message: 'Something went wrong!' }); // Send a 500 response
});

// Start the server and listen on the specified port
app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`); // Log the server status to the console
});
