#  USSD Application - 
**Interactive USSD Application** developed with Laravel to allow real-time consultation of school results directly from any mobile phone, without internet connection or smartphone required.


##  How Does USSD Work?

This application implements a complete USSD service allowing users to:

1. **Dial a USSD code** (e.g., `*123#`) directly from their phone keypad
2. **Navigate an interactive menu** in real-time via USSD sessions
3. **Search and consult** school results without downloading an application
4. **Receive an instant response** displayed directly on the phone screen

### USSD Advantages for Education

The USSD implementation is particularly suited to the African educational context:

##  USSD Features

- **Student Search**: Search by full name
- **Results Consultation**: Display of latest school results
- **Detailed Information**:
  - Student's full name
  - School year
  - School attended
  - Percentage obtained
  - Student's rank

##  Technical Stack USSD

- **Protocol**: USSD (Unstructured Supplementary Service Data)

##  Prerequisites

- PHP 8.2 or higher
- Composer
- MySQL
- An Africa's Talking account for USSD service

##  Installation

1. **Clone the project**
```bash
git clone https://github.com/Alain-Kay/laravel-ussd.git
cd laravel-ussd
```

2. **Install dependencies**
```bash
composer install
```

3. **Configure the environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Run migrations**
```bash
php artisan migrate --seed
```

5. **Configure Africa's Talking USSD**
   
   a. Create an account on [Africa's Talking](https://africastalking.com)
   
   b. Create a USSD code in the dashboard (e.g., `*123#`)
   
   c. Configure the USSD callback URL to your server:
   ```
   https://your-domain.com/ussd/callback
   ```
   
   d. Add your Africa's Talking credentials in `.env`:
   ```env
   AT_USERNAME=your_username
   AT_API_KEY=your_api_key
   ```

6. **Start the server**
```bash
php artisan serve
```

7. **Test the USSD service**
   - Use Africa's Talking USSD simulator to test
   - Or dial the USSD code from Africa's Talking USSD emulator


##  USSD Implementation

### USSD Architecture

This application uses **Africa's Talking USSD Gateway** to manage interactive USSD sessions.

**USSD callback endpoint**: `POST /ussd/callback`

### USSD parameters received from gateway:
- `sessionId`: Unique identifier of the active USSD session
- `serviceCode`: USSD code dialed by the user (e.g., *123#)
- `phoneNumber`: User's phone number
- `text`: User input, separated by `*` for each step

### USSD Responses:
The application returns text responses with specific prefixes:

- **`CON`** (Continue): Menu or prompt requiring a user response
- **`END`**: Final message that terminates the USSD session

### USSD Navigation Flow:

```
*123# (Dialing the code)
    ↓
CON Find the school records.
1. Search for a student
    ↓
[1] (User chooses option 1)
    ↓
CON Enter the student's full name:
    ↓
[Jean Dupont] (User enters the name)
    ↓
END Student's latest results:
Name: Jean Dupont
Year: 2024-2025
School: ABC Primary School
Percentage: 85%
Rank: 5
```

### USSD Session Management:
- Each session is tracked via `sessionId`
- Navigation uses the `*` character as a separator
- Steps are tracked via `explode('*', $text)`



### USSD User Experience

**Step 1: Initiating the USSD session**
- Dial the assigned USSD code (e.g., `*123#`) on any phone
- Press the call button
- An interactive USSD session opens instantly

**Step 2: Navigating the USSD menu**
- The main menu displays: "Find the school records"
- Type `1` for "Search for a student"
- The USSD application responds immediately

**Step 3: Searching via USSD**
- Enter the student's full name (e.g., "Jean Dupont")
- Validate with OK
- The USSD system processes the request in real-time

**Step 4: Consulting results**
- Results are displayed directly on your screen
- No internet connection is required
- The USSD session ends automatically


## 🤝 Contribution

Contributions are welcome! Feel free to:
1. Fork the project
2. Create a branch for your feature
3. Commit your changes
4. Push to the branch
5. Open a Pull Request

## 📄 License

This project is under MIT license.
