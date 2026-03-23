# Zippy Used Autos

A modern PHP-based car dealership management system with public browsing and admin panel capabilities.

## Features

### Public Features
- **Browse Vehicles** - View all available vehicles in a responsive grid layout
- **Filter by Category** - Filter vehicles by Make, Type, or Class (one filter at a time)
- **Sort Options** - Sort by Price (High to Low) or Year (Newest First)
- **Responsive Design** - Works seamlessly on desktop and mobile devices
- **Modern UI** - Purple gradient theme with smooth animations

### Admin Features
- **Dashboard** - View statistics cards showing:
  - Total vehicles
  - Total makes
  - Total types
  - Total classes
  - Quick action buttons for management

- **Vehicle Management**
  - View all vehicles in ascending order
  - Add new vehicles with make, type, and class selection
  - Delete vehicles with confirmation dialog

- **Makes Management**
  - View all car makes alphabetically
  - Add new car makes
  - Delete car makes

- **Types Management**
  - View all vehicle types alphabetically
  - Add new vehicle types
  - Delete vehicle types

- **Classes Management**
  - View all vehicle classes alphabetically
  - Add new vehicle classes
  - Delete vehicle classes

## Technologies Used

- **Backend**: PHP 7.0+
- **Database**: MySQL
- **Frontend**: HTML5, CSS3
- **Architecture**: MVC (Model-View-Controller)
- **Styling**: CSS Gradients, CSS Grid, Flexbox
- **Server**: Apache (XAMPP)

## Installation

### Prerequisites
- XAMPP or similar PHP/MySQL environment
- PHP 7.0 or higher
- MySQL 5.5 or higher

### Setup Steps

1. **Clone/Download the project**
   ```
   Extract to: c:\xampp\htdocs\Zippy Used Autos\
   ```

2. **Create the database**
   - Open phpMyAdmin: `http://localhost/phpmyadmin`
   - Create a new database named `zippy_autos`

3. **Import database tables**
   - Create the following tables:

   ```sql
   CREATE TABLE makes (
     make_id INT AUTO_INCREMENT PRIMARY KEY,
     make_name VARCHAR(255) NOT NULL
   );

   CREATE TABLE types (
     type_id INT AUTO_INCREMENT PRIMARY KEY,
     type_name VARCHAR(255) NOT NULL
   );

   CREATE TABLE classes (
     class_id INT AUTO_INCREMENT PRIMARY KEY,
     class_name VARCHAR(255) NOT NULL
   );

   CREATE TABLE vehicles (
     vehicle_id INT AUTO_INCREMENT PRIMARY KEY,
     model VARCHAR(255) NOT NULL,
     year INT NOT NULL,
     price DECIMAL(10, 2) NOT NULL,
     make_id INT NOT NULL,
     type_id INT NOT NULL,
     class_id INT NOT NULL,
     FOREIGN KEY (make_id) REFERENCES makes(make_id),
     FOREIGN KEY (type_id) REFERENCES types(type_id),
     FOREIGN KEY (class_id) REFERENCES classes(class_id)
   );
   ```

4. **Update database connection**
   - Edit `model/database.php`
   - Update the following:
     - `$host` - Database host (default: localhost)
     - `$username` - Database username (default: root)
     - `$password` - Database password (default: empty)
     - `$dbname` - Database name (default: zippy_autos)

5. **Access the application**
   - Public: `http://localhost/ZippyUsedAutos/`
   - Admin: `http://localhost/ZippyUsedAutos/admin/dashboard.php`

## Project Structure

```
Zippy Used Autos/
├── index.php                    # Public entry point
├── style.css                    # Public stylesheets
├── controllers/                 # Public controllers
│   ├── vehicles.php
│   ├── makes.php
│   ├── types.php
│   └── classes.php
├── model/                       # Database models
│   ├── database.php
│   ├── vehicles_db.php
│   ├── makes_db.php
│   ├── types_db.php
│   └── classes_db.php
├── view/                        # Public views
│   ├── header.php
│   ├── footer.php
│   ├── filter_form.php
│   ├── vehicle_list.php
│   └── course_list.php
├── admin/                       # Admin panel
│   ├── style.css               # Admin stylesheets
│   ├── dashboard.php           # Admin dashboard
│   ├── vehicles.php            # Vehicle management controller
│   ├── makes.php               # Makes management controller
│   ├── types.php               # Types management controller
│   ├── classes.php             # Classes management controller
│   └── view/                   # Admin views
│       ├── header.php
│       ├── footer.php
│       ├── dashboard.php
│       ├── add_vehicle.php
│       ├── add_make.php
│       ├── add_type.php
│       ├── add_class.php
│       ├── vehicles_list.php
│       ├── makes_list.php
│       ├── types_list.php
│       └── classes_list.php
└── README.md                    # This file
```

## Usage

### Public Interface

1. **View All Vehicles**
   - Navigate to the home page
   - All vehicles are displayed in a grid layout

2. **Filter Vehicles**
   - Select a filter option (Make, Type, or Class)
   - Click "Apply Filters"
   - Results update instantly

3. **Sort Vehicles**
   - Choose "Price (High to Low)" or "Year (Newest First)"
   - Click "Apply Filters"

### Admin Panel

1. **Access Dashboard**
   - Go to `http://localhost/ZippyUsedAutos/admin/dashboard.php`
   - View statistics and quick action buttons

2. **Manage Vehicles**
   - Click "Vehicles" in the navigation
   - Click "+ Add New Vehicle" to add vehicles
   - Fill out the form (Model, Year, Price, Make, Type, Class)
   - Click "Delete" to remove vehicles (confirmation required)

3. **Manage Makes/Types/Classes**
   - Similar to vehicle management
   - Navigate to the respective section
   - Add or delete items as needed

## Database Details

### Tables

| Table | Columns | Notes |
|-------|---------|-------|
| makes | make_id, make_name | Car manufacturers (BMW, Toyota, etc.) |
| types | type_id, type_name | Vehicle types (Sedan, SUV, Truck, etc.) |
| classes | class_id, class_name | Vehicle classes (Luxury, Standard, Economy, etc.) |
| vehicles | vehicle_id, model, year, price, make_id, type_id, class_id | Vehicle information |

### Sorting

All lists are sorted in ascending order:
- **Makes**: Alphabetical (A-Z)
- **Types**: Alphabetical (A-Z)
- **Classes**: Alphabetical (A-Z)
- **Vehicles** (Admin): By ID (oldest to newest added)
- **Vehicles** (Public): By Price (High to Low) or Year (Newest First)

## CSS Organization

- **style.css** - Public stylesheets (vehicle browsing, filtering)
- **admin/style.css** - Admin-specific stylesheets (dashboard, forms, tables)

Both stylesheets feature:
- Purple gradient color scheme (#667eea to #764ba2)
- Responsive design (768px breakpoint for mobile)
- Smooth transitions and hover effects
- Modern UI components

## Features Highlights

✨ **Modern Design**
- Gradient backgrounds
- Smooth animations
- Professional color scheme

📱 **Responsive**
- Mobile-friendly interface
- Works on all screen sizes
- Touch-friendly buttons

🎨 **Easy to Customize**
- Organized CSS files
- Clean code structure
- Clear MVC pattern

🔒 **Data Management**
- Secure database operations
- Form validation
- Delete confirmation dialogs

## Future Enhancements

- User authentication system
- Advanced search features
- Image upload for vehicles
- Edit functionality for vehicles
- Reporting and analytics
- Email notifications

## Support

For issues or questions, please review the file structure and ensure:
1. Database connection is properly configured
2. All required tables are created
3. File permissions are set correctly
4. XAMPP Apache and MySQL services are running

## License

This project is provided as-is for educational and personal use.

---

**Version**: 1.0  
**Last Updated**: March 2026
