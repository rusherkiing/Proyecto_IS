CREATE TABLE patients (
  patient_id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(100) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  email VARCHAR(150) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  photo VARCHAR(255)
);

CREATE TABLE doctors (
  doctor_id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(100) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  email VARCHAR(150) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  photo VARCHAR(255),
  specialty VARCHAR(100) NOT NULL
);

CREATE TABLE appointments (
  appointment_id INT PRIMARY KEY AUTO_INCREMENT,
  patient_id INT NOT NULL,
  doctor_id INT NOT NULL,
  appointment_date DATE NOT NULL,
  appointment_time TIME NOT NULL,
  status ENUM('scheduled', 'cancelled', 'completed') DEFAULT 'scheduled',
  FOREIGN KEY (patient_id) REFERENCES patients(patient_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (doctor_id) REFERENCES doctors(doctor_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE medical_records (
  record_id INT PRIMARY KEY AUTO_INCREMENT,
  patient_id INT NOT NULL,
  doctor_id INT NOT NULL,
  record_date DATE NOT NULL,
  specialty VARCHAR(100) NOT NULL,
  diagnosis TEXT,
  treatment TEXT,
  studies TEXT,
  FOREIGN KEY (patient_id) REFERENCES patients(patient_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (doctor_id) REFERENCES doctors(doctor_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE notifications (
  notification_id INT PRIMARY KEY AUTO_INCREMENT,
  patient_id INT NOT NULL,
  message VARCHAR(255) NOT NULL,
  notification_date DATE NOT NULL,
  type ENUM('reminder', 'alert', 'update') DEFAULT 'reminder',
  FOREIGN KEY (patient_id) REFERENCES patients(patient_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE schedules (
  schedule_id INT PRIMARY KEY AUTO_INCREMENT,
  doctor_id INT NOT NULL,
  start_time TIME NOT NULL,
  end_time TIME NOT NULL,
  availability ENUM('available', 'unavailable') DEFAULT 'available',
  shift ENUM('morning', 'afternoon', 'night') NOT NULL,
  FOREIGN KEY (doctor_id) REFERENCES doctors(doctor_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE admins (
  admin_id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(100) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  email VARCHAR(150) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('superadmin', 'manager') DEFAULT 'manager',
  is_active BOOLEAN DEFAULT TRUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
