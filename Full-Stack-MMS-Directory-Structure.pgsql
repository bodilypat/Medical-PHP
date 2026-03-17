Full-Stack-Medical-Management System-Directory-Structure
├── backend/                                       
│   ├── Console/
│   │  	├── db.js
│   │   └──
│   ├── Exceptions/
│   │  	├── db.js
│   │   └── 
│   ├── app/
│   │   ├── Http/   
│   │   │   ├── Controllers/
│   │   │   │   ├── PatientController.php
│   │   │   │   ├── DoctorController.php
│   │   │   │   ├── AppointmentController.php
│   │   │   │   └── BillingController.php
│   │   │   └── Middleware/
│   │   │       ├── Authenticate.php                              # check user is logged in.
│   │   │       ├── EncryptCookies.php                            # Encrypts cookies before storing them.
│   │   │       ├── RedirectIfAuthenticated.php                   # Prevents logged-in users from accessing login or register page again.
│   │   │       └── VerifyCsrfToken.php                           # Protects the application from CSRF attacks.
│   │   ├── Models/                
│   │   │   ├── Patient.php       
│   │   │   ├── Doctor.php   
│   │   │   ├── Appointment.php      
│   │   │   └── Prescription.php
│   │   └── Providers/
│   │       ├── AppServiceProvider.php
│   │       ├── AuthServiceProvider.php
│   │       └── RouteServiceProvider.php
│   ├── bootstrap/           
│   │   ├── 
│   │   └──  
│   ├── config/
│   │   ├── 
│   │   └──   
│   ├── database/
│   │   ├── 
│   │  	├── 
│   │   └──                  
│   ├── public/  
│   │  	├── 
│   │   └──  
│   ├── resources/  
│   │  	├── 
│   │   └──   
│   ├── routes/  
│   │  	├── 
│   │   └──  
│   ├── storage/  
│   │  	├── 
│   │   └──  
│   ├── tests/  
│   │  	├── 
│   │   └──  
│   ├── vendor/  
│   │  	├── 
│   │   └──  
│   ├── .env
│   ├── .artisan
│   ├── composer.json 
│   └── package.json                                                                      
│
├── frontend(medical-management-system)    
│   │ 
│   ├── public 
│   │   ├── index.html
│   │   ├── login.html
│   │   ├── dashboard.html
│   │   ├── patient.html
│   │   ├── doctors.html
│   │   └── appointment.html                # Main HTML Template
│   ├── src/                        
│   │   ├── components/                
│   │   │   ├── Header.js          
│   │   │   ├── Sidebar.js   
│   │   │   ├── Footer.js      
│   │   │   ├── Notification.js 
│   │   │   ├── card/
│   │   │   │   ├── Card.js
│   │   │   │   ├── Card.css
│   │   │   │   └── index.js
│   │   │   ├── table/
│   │   │   │   ├── Table.js
│   │   │   │   ├── Table.css
│   │   │   │   └── index.js
│   │   │   ├── modal/
│   │   │   │   ├── Modal.js
│   │   │   │   ├── Modal.css
│   │   │   │   └── index.js
│   │   │   └── Loader.js
│   │   ├── pages/      
│   │   │   ├── auth/
│   │   │   │   ├── Login.jsx
│   │   │   │   ├── Register.jsx
│   │   │   │   ├── auth.css
│   │   │   │   └── index.js          
│   │   │   ├── dashbord/
│   │   │   │   ├── Dashbord.jsx
│   │   │   │   ├── Dashboard.css
│   │   │   │   └── index.js
│   │   │   ├── patients/
│   │   │   │   ├── Patients.jsx
│   │   │   │   ├── Patients.css
│   │   │   │   └── index.js  
│   │   │   ├── doctors/   
│   │   │   │   ├── Doctors.jsx
│   │   │   │   ├── Doctor.css
│   │   │   │   └── index.js 
│   │   │   ├── appointment/
│   │   │   │   ├── Appointment.jsx
│   │   │   │   ├── Appointment.css
│   │   │   │   └── index.js
│   │   │   ├── billing/   
│   │   │   │   ├── Billing.js
│   │   │   │   ├── billing.css
│   │   │   │   └── index.js    
│   │   │   └── pharmacy/
│   │   │       ├── Pharmarcy.jsx
│   │   │       ├── Pharmarcy.css
│   │   │       └── index.js
│   │   ├── services/                
│   │   │   ├── api.js         
│   │   │   ├── patientsService.js   
│   │   │   ├── doctorsService.js
│   │   │   ├── appointmentsService.js
│   │   │   ├── billingService.js
│   │   │   └── pharmacyService.js
│   │   ├── context/                
│   │   │   ├── AuthContext.jsx        
│   │   │   ├── 
│   │   │   ├── 
│   │   │   └── 
│   │   ├── App.js     
│   │   ├── index.js
│   │   └── styles/
│   │       ├── main.css
│   │       └── components.css
│   │ 
│   ├── utils/                                # Utility scripts/helpers
│   │   ├── form-validation.js
│   │   └── date-utils.js 
│   └── store/                                # (optional) Shared data/state (local/session/user)
│       └── session.js 
│    
├── README.md 
└── LICENSE                    

