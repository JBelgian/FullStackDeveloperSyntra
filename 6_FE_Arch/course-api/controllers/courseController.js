// Import the database configuration
const db = require('../config/database');

const courseController = {
  // Get all courses
  getAllCourses: async (req, res) => {
    try {
      // Query the database to retrieve all courses
      const [courses] = await db.query('SELECT * FROM courses');
      // Respond with the retrieved courses in JSON format
      res.json(courses);
    } catch (error) {
      // Handle any database errors by sending a 500 status and error message
      res.status(500).json({ message: error.message });
    }
  },

  // Get a single course by ID
  getCourse: async (req, res) => {
    try {
      // Query the database for a course with the specified ID from the request parameters
      const [course] = await db.query('SELECT * FROM courses WHERE id = ?', [req.params.id]);
      
      // If no course is found, respond with a 404 status and an error message
      if (course.length === 0) {
        return res.status(404).json({ message: 'Course not found' });
      }
      
      // Return the first course from the result set in JSON format
      res.json(course[0]);
    } catch (error) {
      // Handle any database errors by sending a 500 status and error message
      res.status(500).json({ message: error.message });
    }
  },

  // Create a new course
  createCourse: async (req, res) => {
    try {
      // Destructure the course details from the request body
      const { name, price, start, duration, type_id } = req.body;
      
      // Insert the new course into the database using placeholders for security
      const [result] = await db.query(
        'INSERT INTO courses (name, price, start, duration, type_id) VALUES (?, ?, ?, ?, ?)',
        [name, price, start, duration, type_id]
      );
      
      // Respond with the newly created course details and the generated ID (insertId = latest auto increment id)
      res.status(201).json({
        id: result.insertId,
        name,
        price,
        start,
        duration,
        type_id
      });
    } catch (error) {
      // Handle any database errors by sending a 500 status and error message
      res.status(500).json({ message: error.message });
    }
  },

   // Update an existing course by ID
   updateCourse: async (req, res) => {
    try {
      // Destructure updated course details from the request body
      const { name, price, start, duration, type_id } = req.body;
      
      // Update the course in the database using the provided ID and placeholders
      const [result] = await db.query(
        'UPDATE courses SET name = ?, price = ?, start = ?, duration = ?, type_id = ? WHERE id = ?',
        [name, price, start, duration, type_id, req.params.id]
      );
      
      // If no rows were affected, the course was not found, respond with a 404 status
      if (result.affectedRows === 0) {
        return res.status(404).json({ message: 'Course not found' });
      }
      
      // Respond with a success message
      res.json({ message: 'Course updated successfully' });
    } catch (error) {
      // Handle any database errors by sending a 500 status and error message
      res.status(500).json({ message: error.message });
    }
  },

  // Delete a course by ID
  deleteCourse: async (req, res) => {
    try {
      // Delete the course from the database using the provided ID
      const [result] = await db.query('DELETE FROM courses WHERE id = ?', [req.params.id]);
      
      // If no rows were affected, the course was not found, respond with a 404 status
      if (result.affectedRows === 0) {
        return res.status(404).json({ message: 'Course not found' });
      }
      
      // Respond with a success message
      res.json({ message: 'Course deleted successfully' });
    } catch (error) {
      // Handle any database errors by sending a 500 status and error message
      res.status(500).json({ message: error.message });
    }
  }
};

// Export the courseController object for use in other parts of the application
module.exports = courseController;
