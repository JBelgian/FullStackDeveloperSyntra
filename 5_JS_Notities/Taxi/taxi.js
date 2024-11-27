class Taxi {
    constructor(make, model, client) {
        this.make = make;
        this.model = model;
        this.totalDistance = 0;
        this.farerPerKm = 2.6;    
        this.fare = 0; 
        this.startFee = 3.5;  
        this.client = client  
    }

    // Method to start a fare
    startFare() {
        this.totalDistance = 0;
        this.fare = 0;
        console.log(`Trip started in ${this.model} ${this.make}`)
    }

    // Method to add distance traveled
    addDistance (distance) {
        if (distance < 0) {
            console.log('Distance cannot be negative')
            return // exit the method and stop the rest of the execution
        }
        this.totalDistance += distance;
        console.log(`Added ${distance} km. Total distance ${this.totalDistance} km.`) 
    }

    // Method to calculate the total fare
    calculateTotalFare () {
        this.fare = this.fare + this.startFee;
        this.fare += this.farerPerKm * this.totalDistance;
        console.log(`Total fare for ${this.totalDistance} km is ${this.fare.toFixed(2)} EUR`);
        return this.fare;
    }

    endTrip() {
        console.log(`Trip ended! Thank you come again. Total fare: ${this.fare.toFixed(2)} EUR`)
    }
}

class Client {
    constructor (name, phone) {
        this.name;
        this.phone;
    }
}

// Create a new Taxi object
const myClient = new Client('Massimo', '0000000')
const myTaxi = new Taxi('Toyota', 'Corolla', myClient);

console.log(myClient);

// Start a new fare
myTaxi.startFare();

// Add distance travelled
myTaxi.addDistance(12);
myTaxi.addDistance(60);

// Calculate the fare at the end of the ride
myTaxi.calculateTotalFare();


myTaxi.endTrip();
