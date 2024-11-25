# Moe Bebe

### About the Project

Moe Bebe is a platform for parents to connect with their babies in hospitals' Intensive Care Units (ICUs). The project's goal is to provide a way for parents to stay connected with their babies through a web-based interface.

The project uses Laravel for the backend and Vue.js for the front end. It leverages modern web technologies to provide a seamless and responsive experience for parents to track and communicate about their baby’s well-being.

### Tech Stack

	•	Frontend: Vue.js, Vue Router, Vuex
	•	Backend: Laravel
	•	Database: MySQL
	•	Authentication: Laravel Sanctum for API authentication
	•	Build Tools: Laravel Mix, Vue CLI
	•	Deployment: Docker (optional)

## Project Setup

### Prerequisites

Ensure you have the following tools installed:
	•	PHP (version 8.0+)
	•	Composer
	•	Node.js (version 16.0+)
	•	npm

### Steps to Run the Project:

### Backend (Laravel)

1.	Clone the repository:

    ``git clone https://github.com/AlekJanevski/moe-bebe.git
    cd moe-bebe``


2.	Install PHP dependencies using Composer:

    ``composer install``


3.	Set up your .env file:

    ``cp .env.example .env``


4.	Start docker:

    ``docker-compose up -d``


6.	Run migrations:

    ``php artisan migrate``


7.	Start the Laravel server:

    ``php artisan serve``



### Frontend (Vue.js 3)

1.	Install frontend dependencies:

    ``npm install``

2. Ensure you run the latest node (check with node -v). if not, run ```nvm use node```


3.	Run the development server:

    ``npm run dev``


4.	Access the app at http://localhost.
