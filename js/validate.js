// document.getElementById('SelfNomination').addEventListener('input', function(e) {
//     var value = e.target.value;
//     e.target.value = value.replace(/[^a-zA-Z\s]/g, '');
// });
document.getElementById('PersonName').addEventListener('input', function (e) {
    var value = e.target.value;
    e.target.value = value.replace(/[^a-zA-Z\s]/g, '');
});
document.getElementById('CompanyName').addEventListener('input', function (e) {
    var value = e.target.value;
    e.target.value = value.replace(/[^a-zA-Z\s]/g, '');
});

$(document).ready(function () {
    $('#birthdate').on('blur', function () {
        validateAge();
    });

    function validateAge() {
        var birthdate = new Date($('#birthdate').val());
        // var minAllowedDate = new Date('1984-10-01');
        var minAllowedDate = new Date('1984-09-30');

        if (birthdate < minAllowedDate) {
            alert('Should be born after 1 Oct 1984.');
            $('#birthdate').val(''); // Clear the input field
        }
    }
});


$(document).ready(function () {
    // Attach the validateAge function to both 'blur' and 'change' events
    $('#birthdate').on('change', function () {
        validateAge();
    });

    function validateAge() {
        var birthdate = new Date($('#birthdate').val());
        var minAllowedDate = new Date('1984-09-30'); // Minimum date to ensure age is at least 40 years

        if (birthdate < minAllowedDate) {
            alert('Should be born after 1 Oct 1984.');
            $('#birthdate').val(''); // Clear the input field
        }
    }
});

document.getElementById('DoBProofe').addEventListener('change', function () {
    const file = this.files[0];

    if (file) {
        // Check if the file is a PDF
        const fileType = file.type;
        if (fileType !== 'application/pdf') {
            alert('Please upload a PDF file.');
            this.value = ''; // Clear the input
            return;
        }

        // Check if the file size is at most 2 MB
        const maxSize = 2 * 1024 * 1024; // 2 MB in bytes
        if (file.size > maxSize) {
            alert('The file size must not exceed 2 MB.');
            this.value = ''; // Clear the input
            return;
        }

        // Check for double extension
        const fileName = file.name;
        const doubleExtensionPattern = /\.[^.]+\.pdf$/i;
        if (doubleExtensionPattern.test(fileName)) {
            alert('The file name should not contain double extensions (e.g., file.pdf.pdf).');
            this.value = ''; // Clear the input
            return;
        }


        // Optional: Content signature check (complex and typically not done in client-side JS)
        // This is usually handled by server-side processing or file scanning software.

        // If all checks pass, you can proceed with the file upload or further processing
    }
});





function updateUI() {
    const selectValue = document.getElementById('level-selectsss').value;
    const isCheckboxChecked = document.getElementById('declarations').checked;
    const modal = document.getElementById('customModal');
    const overlay = document.getElementById('overlay');
    const saveButton = document.getElementById('saveButtons');

    if (selectValue === 'Yes') {
        modal.style.display = 'block';
        overlay.style.display = 'block';
        // Clear the selection to ensure it triggers the correct logic
        document.getElementById('level-selectsss').value = '';
        // Keep the save button disabled in this case
        saveButton.disabled = true;
    } else {
        modal.style.display = 'none';
        overlay.style.display = 'none';
        // Enable the save button based on checkbox state
        saveButton.disabled = !isCheckboxChecked;
    }
}

// Dropdown change event
document.getElementById('level-selectsss').addEventListener('change', updateUI);

// Checkbox change event
document.getElementById('declarations').addEventListener('change', updateUI);

// Close modal on cancel button click
document.getElementById('closeModalButton').addEventListener('click', function () {

    document.getElementById('customModal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
});

document.getElementById('closeModalButton-1').addEventListener('click', function () {
    document.getElementById('customModal-1').style.display = 'none';
    document.getElementById('overlay-1').style.display = 'none';
});






document.getElementById('DisciplinaryCase').addEventListener('change', function () {
    const selectedValue = this.value;
    const modal = document.getElementById('customModal-1');
    const overlay = document.getElementById('overlay-1');
    const saveButton = document.getElementById('saveButtons'); // Assuming there is a save button

    if (selectedValue === 'Yes') {
        modal.style.display = 'block';
        overlay.style.display = 'block';
        document.getElementById('DisciplinaryCase').value = '';
        saveButton.disabled = true; // Disable the save button
    } else {
        modal.style.display = 'none';
        overlay.style.display = 'none';
        saveButton.disabled = false; // Enable the save button
    }
});

// Close button to hide the modal
// document.getElementById('closeModalButton-1').addEventListener('click', function () {
//     const modal = document.getElementById('customModal-1');
//     const overlay = document.getElementById('overlay-1');
//     modal.style.display = 'none';
//     overlay.style.display = 'none';
// });







document.getElementById('ICAIMembershipNo').addEventListener('input', function (e) {
    const input = e.target;
    input.value = input.value.replace(/\D/g, '');
    if (input.value.length > 6) {
        input.value = input.value.slice(0, 6);
    }
});
document.getElementById('EmailID').addEventListener('input', function () {
    const emailInput = document.getElementById('EmailID');
    const emailError = document.getElementById('emailError');
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (emailInput.value === '' || emailPattern.test(emailInput.value)) {
        emailError.style.display = 'none';
        emailInput.setCustomValidity('');
    } else {
        emailError.style.display = 'block';
        emailInput.setCustomValidity('Invalid email address');
    }
});
document.getElementById('AltEmail').addEventListener('input', function () {
    const emailInput1 = document.getElementById('AltEmail');
    const emailError1 = document.getElementById('emailError1');
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (emailInput1.value === '' || emailPattern.test(emailInput1.value)) {
        emailError1.style.display = 'none';
        emailInput1.setCustomValidity('');
    } else {
        emailError1.style.display = 'block';
        emailInput1.setCustomValidity('Invalid email address');
    }
});
document.getElementById('MobileNo').addEventListener('input', function () {
    const mobileInput = document.getElementById('MobileNo');
    const phoneError = document.getElementById('phoneError');
    mobileInput.value = mobileInput.value.replace(/\D/g, '');
    if (mobileInput.value.length === 10) {
        phoneError.style.display = 'none';
        mobileInput.setCustomValidity('');
    } else {
        phoneError.style.display = 'block';
        mobileInput.setCustomValidity('Invalid phone number');
    }
});
document.getElementById('AltMobile').addEventListener('input', function () {
    const mobileInput1 = document.getElementById('AltMobile');
    const phoneError1 = document.getElementById('phoneError1');
    mobileInput1.value = mobileInput1.value.replace(/\D/g, '');
    if (mobileInput1.value.length === 10) {
        phoneError1.style.display = 'none';
        mobileInput1.setCustomValidity('');
    } else {
        phoneError1.style.display = 'block';
        mobileInput1.setCustomValidity('Invalid phone number');
    }
});
var AndhraPradesh = ["Srikakulam", "Vizianagaram", "Manyam Dist", "Alluri Sitaram Raju", "Visakhapatnam", "Anakapalli", "Kakinada", "Kona Seema", "East Godavari", "West Godavari", "Eluru", "Krishna", "NTR District", "Guntur", "Bapatla", "Palnadu", "Prakasam", "Sri Potti Sriramulu Nellore"
    , "Kurnool", "Nandyal", "Ananthapuram", "Sri Satyasai", "YSR Kadapa", "Annamayya", "Chittoor", "Sri Balaji"
];
var ArunachalPradesh = ["Anjaw", "Changlang", "Dibang Valley", "East Kameng", "East Siang", "Kra Daadi", "Kurung Kumey", "Lohit", "Longding", "Lower Dibang Valley", "Lower Subansiri", "Namsai", "Papum Pare", "Siang", "Tawang", "Tirap", "Upper Siang", "Upper Subansiri", "West Kameng", "West Siang", "Itanagar"];
var Assam = ["Baksa", "Barpeta", "Biswanath", "Bongaigaon", "Cachar", "Charaideo", "Chirang", "Darrang", "Dhemaji", "Dhubri", "Dibrugarh", "Goalpara", "Golaghat", "Hailakandi", "Hojai", "Jorhat", "Kamrup Metropolitan", "Kamrup (Rural)", "Karbi Anglong", "Karimganj", "Kokrajhar", "Lakhimpur", "Majuli", "Morigaon", "Nagaon", "Nalbari", "Dima Hasao", "Sivasagar", "Sonitpur", "South Salmara Mankachar", "Tinsukia", "Udalguri", "West Karbi Anglong"];
var Bihar = ["Araria", "Arwal", "Aurangabad", "Banka", "Begusarai", "Bhagalpur", "Bhojpur", "Buxar", "Darbhanga", "East Champaran", "Gaya", "Gopalganj", "Jamui", "Jehanabad", "Kaimur", "Katihar", "Khagaria", "Kishanganj", "Lakhisarai", "Madhepura", "Madhubani", "Munger", "Muzaffarpur", "Nalanda", "Nawada", "Patna", "Purnia", "Rohtas", "Saharsa", "Samastipur", "Saran", "Sheikhpura", "Sheohar", "Sitamarhi", "Siwan", "Supaul", "Vaishali", "West Champaran"];
var Chhattisgarh = ["Balod", "Baloda Bazar", "Balrampur", "Bastar", "Bemetara", "Bijapur", "Bilaspur", "Dantewada", "Dhamtari", "Durg", "Gariaband", "Janjgir Champa", "Jashpur", "Kabirdham", "Kanker", "Kondagaon", "Korba", "Koriya", "Mahasamund", "Mungeli", "Narayanpur", "Raigarh", "Raipur", "Rajnandgaon", "Sukma", "Surajpur", "Surguja"];
var Goa = ["North Goa", "South Goa"];
var Gujarat = ["Ahmedabad", "Amreli", "Anand", "Aravalli", "Banaskantha", "Bharuch", "Bhavnagar", "Botad", "Chhota Udaipur", "Dahod", "Dang", "Devbhoomi Dwarka", "Gandhinagar", "Gir Somnath", "Jamnagar", "Junagadh", "Kheda", "Kutch", "Mahisagar", "Mehsana", "Morbi", "Narmada", "Navsari", "Panchmahal", "Patan", "Porbandar", "Rajkot", "Sabarkantha", "Surat", "Surendranagar", "Tapi", "Vadodara", "Valsad"];
var Haryana = ["Ambala", "Bhiwani", "Charkhi Dadri", "Faridabad", "Fatehabad", "Gurugram", "Hisar", "Jhajjar", "Jind", "Kaithal", "Karnal", "Kurukshetra", "Mahendragarh", "Mewat", "Palwal", "Panchkula", "Panipat", "Rewari", "Rohtak", "Sirsa", "Sonipat", "Yamunanagar"];
var HimachalPradesh = ["Bilaspur", "Chamba", "Hamirpur", "Kangra", "Kinnaur", "Kullu", "Lahaul Spiti", "Mandi", "Shimla", "Sirmaur", "Solan", "Una"];
var JammuKashmir = ["Anantnag", "Bandipora", "Baramulla", "Budgam", "Doda", "Ganderbal", "Jammu", "Kargil", "Kathua", "Kishtwar", "Kulgam", "Kupwara", "Leh", "Poonch", "Pulwama", "Rajouri", "Ramban", "Reasi", "Samba", "Shopian", "Srinagar", "Udhampur"];
var Jharkhand = ["Bokaro", "Chatra", "Deoghar", "Dhanbad", "Dumka", "East Singhbhum", "Garhwa", "Giridih", "Godda", "Gumla", "Hazaribagh", "Jamtara", "Khunti", "Koderma", "Latehar", "Lohardaga", "Pakur", "Palamu", "Ramgarh", "Ranchi", "Sahebganj", "Seraikela Kharsawan", "Simdega", "West Singhbhum"];
var Karnataka = ["Bagalkot", "Bangalore Rural", "Bangalore Urban", "Belgaum", "Bellary", "Bidar", "Vijayapura", "Chamarajanagar", "Chikkaballapur", "Chikkamagaluru", "Chitradurga", "Dakshina Kannada", "Davanagere", "Dharwad", "Gadag", "Gulbarga", "Hassan", "Haveri", "Kodagu", "Kolar", "Koppal", "Mandya", "Mysore", "Raichur", "Ramanagara", "Shimoga", "Tumkur", "Udupi", "Uttara Kannada", "Yadgir"];
var Kerala = ["Alappuzha", "Ernakulam", "Idukki", "Kannur", "Kasaragod", "Kollam", "Kottayam", "Kozhikode", "Malappuram", "Palakkad", "Pathanamthitta", "Thiruvananthapuram", "Thrissur", "Wayanad"];
var MadhyaPradesh = ["Agar Malwa", "Alirajpur", "Anuppur", "Ashoknagar", "Balaghat", "Barwani", "Betul", "Bhind", "Bhopal", "Burhanpur", "Chhatarpur", "Chhindwara", "Damoh", "Datia", "Dewas", "Dhar", "Dindori", "Guna", "Gwalior", "Harda", "Hoshangabad", "Indore", "Jabalpur", "Jhabua", "Katni", "Khandwa", "Khargone", "Mandla", "Mandsaur", "Morena", "Narsinghpur", "Neemuch", "Panna", "Raisen", "Rajgarh", "Ratlam", "Rewa", "Sagar", "Satna",
    "Sehore", "Seoni", "Shahdol", "Shajapur", "Sheopur", "Shivpuri", "Sidhi", "Singrauli", "Tikamgarh", "Ujjain", "Umaria", "Vidisha"
];
var Maharashtra = ["Ahmednagar", "Akola", "Amravati", "Aurangabad", "Beed", "Bhandara", "Buldhana", "Chandrapur", "Dhule", "Gadchiroli", "Gondia", "Hingoli", "Jalgaon", "Jalna", "Kolhapur", "Latur", "Mumbai City", "Mumbai Suburban", "Nagpur", "Nanded", "Nandurbar", "Nashik", "Osmanabad", "Palghar", "Parbhani", "Pune", "Raigad", "Ratnagiri", "Sangli", "Satara", "Sindhudurg", "Solapur", "Thane", "Wardha", "Washim", "Yavatmal"];
var Manipur = ["Bishnupur", "Chandel", "Churachandpur", "Imphal East", "Imphal West", "Jiribam", "Kakching", "Kamjong", "Kangpokpi", "Noney", "Pherzawl", "Senapati", "Tamenglong", "Tengnoupal", "Thoubal", "Ukhrul"];
var Meghalaya = ["East Garo Hills", "East Jaintia Hills", "East Khasi Hills", "North Garo Hills", "Ri Bhoi", "South Garo Hills", "South West Garo Hills", "South West Khasi Hills", "West Garo Hills", "West Jaintia Hills", "West Khasi Hills"];
var Mizoram = ["Aizawl", "Champhai", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Serchhip", "Aizawl", "Champhai", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Serchhip"];
var Nagaland = ["Dimapur", "Kiphire", "Kohima", "Longleng", "Mokokchung", "Mon", "Peren", "Phek", "Tuensang", "Wokha", "Zunheboto"];
var Odisha = ["Angul", "Balangir", "Balasore", "Bargarh", "Bhadrak", "Boudh", "Cuttack", "Debagarh", "Dhenkanal", "Gajapati", "Ganjam", "Jagatsinghpur", "Jajpur", "Jharsuguda", "Kalahandi", "Kandhamal", "Kendrapara", "Kendujhar", "Khordha", "Koraput", "Malkangiri", "Mayurbhanj", "Nabarangpur", "Nayagarh", "Nuapada", "Puri", "Rayagada", "Sambalpur", "Subarnapur", "Sundergarh"];
var Punjab = ["Amritsar", "Barnala", "Bathinda", "Faridkot", "Fatehgarh Sahib", "Fazilka", "Firozpur", "Gurdaspur", "Hoshiarpur", "Jalandhar", "Kapurthala", "Ludhiana", "Mansa", "Moga", "Mohali", "Muktsar", "Pathankot", "Patiala", "Rupnagar", "Sangrur", "Shaheed Bhagat Singh Nagar", "Tarn Taran"];
var Rajasthan = ["Ajmer", "Alwar", "Banswara", "Baran", "Barmer", "Bharatpur", "Bhilwara", "Bikaner", "Bundi", "Chittorgarh", "Churu", "Dausa", "Dholpur", "Dungarpur", "Ganganagar", "Hanumangarh", "Jaipur", "Jaisalmer", "Jalore", "Jhalawar", "Jhunjhunu", "Jodhpur", "Karauli", "Kota", "Nagaur", "Pali", "Pratapgarh", "Rajsamand", "Sawai Madhopur", "Sikar", "Sirohi", "Tonk", "Udaipur"];
var Sikkim = ["East Sikkim", "North Sikkim", "South Sikkim", "West Sikkim"];
var TamilNadu = ["Ariyalur", "Chennai", "Coimbatore", "Cuddalore", "Dharmapuri", "Dindigul", "Erode", "Kanchipuram", "Kanyakumari", "Karur", "Krishnagiri", "Madurai", "Nagapattinam", "Namakkal", "Nilgiris", "Perambalur", "Pudukkottai", "Ramanathapuram", "Salem", "Sivaganga", "Thanjavur", "Theni", "Thoothukudi", "Tiruchirappalli", "Tirunelveli", "Tiruppur", "Tiruvallur", "Tiruvannamalai", "Tiruvarur", "Vellore", "Viluppuram", "Virudhunagar"];
var Telangana = ["Adilabad", "Bhadradri Kothagudem", "Hyderabad", "Jagtial", "Jangaon", "Jayashankar", "Jogulamba", "Kamareddy", "Karimnagar", "Khammam", "Komaram Bheem", "Mahabubabad", "Mahbubnagar", "Mancherial", "Medak", "Medchal", "Nagarkurnool", "Nalgonda", "Nirmal", "Nizamabad", "Peddapalli", "Rajanna Sircilla", "Ranga Reddy", "Sangareddy", "Siddipet", "Suryapet", "Vikarabad", "Wanaparthy", "Warangal Rural", "Warangal Urban", "Yadadri Bhuvanagiri"];
var Tripura = ["Dhalai", "Gomati", "Khowai", "North Tripura", "Sepahijala", "South Tripura", "Unakoti", "West Tripura"];
//   var Uttaranchal = ["Dehradun", "Haridwar", "Chamoli", "Rudraprayag", "Sepahijala", "South Tripura", "Unakoti", "West Tripura"];
var UttarPradesh = ["Agra", "Aligarh", "Allahabad", "Ambedkar Nagar", "Amethi", "Amroha", "Auraiya", "Azamgarh", "Baghpat", "Bahraich", "Ballia", "Balrampur", "Banda", "Barabanki", "Bareilly", "Basti", "Bhadohi", "Bijnor", "Budaun", "Bulandshahr", "Chandauli", "Chitrakoot", "Deoria", "Etah", "Etawah", "Faizabad", "Farrukhabad", "Fatehpur", "Firozabad", "Gautam Buddha Nagar", "Ghaziabad", "Ghazipur", "Gonda", "Gorakhpur", "Hamirpur", "Hapur", "Hardoi", "Hathras", "Jalaun", "Jaunpur", "Jhansi", "Kannauj", "Kanpur Dehat", "Kanpur Nagar", "Kasganj", "Kaushambi", "Kheri", "Kushinagar", "Lalitpur", "Lucknow", "Maharajganj", "Mahoba", "Mainpuri", "Mathura", "Mau", "Meerut", "Mirzapur", "Moradabad", "Muzaffarnagar", "Pilibhit", "Pratapgarh", "Raebareli", "Rampur", "Saharanpur", "Sambhal", "Sant Kabir Nagar", "Shahjahanpur", "Shamli", "Shravasti", "Siddharthnagar", "Sitapur", "Sonbhadra", "Sultanpur", "Unnao", "Varanasi"];
var Uttarakhand = ["Almora", "Bageshwar", "Chamoli", "Champawat", "Dehradun", "Haridwar", "Nainital", "Pauri", "Pithoragarh", "Rudraprayag", "Tehri", "Udham Singh Nagar", "Uttarkashi"];
var WestBengal = ["Alipurduar", "Bankura", "Birbhum", "Cooch Behar", "Dakshin Dinajpur", "Darjeeling", "Hooghly", "Howrah", "Jalpaiguri", "Jhargram", "Kalimpong", "Kolkata", "Malda", "Murshidabad", "Nadia", "North 24 Parganas", "Paschim Bardhaman", "Paschim Medinipur", "Purba Bardhaman", "Purba Medinipur", "Purulia", "South 24 Parganas", "Uttar Dinajpur"];
var AndamanNicobar = ["Nicobar", "North Middle Andaman", "South Andaman"];
var Chandigarh = ["Chandigarh"];
var DadraHaveli = ["Dadra Nagar Haveli"];
var DamanDiu = ["Daman", "Diu"];
var Delhi = ["Central Delhi", "East Delhi", "New Delhi", "North Delhi", "North East Delhi", "North West Delhi", "Shahdara", "South Delhi", "South East Delhi", "South West Delhi", "West Delhi"];
var Lakshadweep = ["Lakshadweep"];
var Puducherry = ["Karaikal", "Mahe", "Puducherry", "Yanam"];
$("#inputState").change(function () {
    var StateSelected = $(this).val();
    var optionsList;
    var htmlString = "";
    switch (StateSelected) {
        case "Andhra Pradesh":
            optionsList = AndhraPradesh;
            break;
        case "Arunachal Pradesh":
            optionsList = ArunachalPradesh;
            break;
        case "Assam":
            optionsList = Assam;
            break;
        case "Bihar":
            optionsList = Bihar;
            break;
        case "Chhattisgarh":
            optionsList = Chhattisgarh;
            break;
        case "Goa":
            optionsList = Goa;
            break;
        case "Gujarat":
            optionsList = Gujarat;
            break;
        case "Haryana":
            optionsList = Haryana;
            break;
        case "Himachal Pradesh":
            optionsList = HimachalPradesh;
            break;
        case "Jammu and Kashmir":
            optionsList = JammuKashmir;
            break;
        case "Jharkhand":
            optionsList = Jharkhand;
            break;
        case "Karnataka":
            optionsList = Karnataka;
            break;
        case "Kerala":
            optionsList = Kerala;
            break;
        case "Madya Pradesh":
            optionsList = MadhyaPradesh;
            break;
        case "Maharashtra":
            optionsList = Maharashtra;
            break;
        case "Manipur":
            optionsList = Manipur;
            break;
        case "Meghalaya":
            optionsList = Meghalaya;
            break;
        case "Mizoram":
            optionsList = Mizoram;
            break;
        case "Nagaland":
            optionsList = Nagaland;
            break;
        case "Orissa":
            optionsList = Odisha;
            break;
        case "Punjab":
            optionsList = Punjab;
            break;
        case "Rajasthan":
            optionsList = Rajasthan;
            break;
        case "Sikkim":
            optionsList = Sikkim;
            break;
        case "Tamil Nadu":
            optionsList = TamilNadu;
            break;
        case "Telangana":
            optionsList = Telangana;
            break;
        case "Tripura":
            optionsList = Tripura;
            break;
        case "Uttaranchal":
            optionsList = Uttarakhand;
            break;
        case "Uttar Pradesh":
            optionsList = UttarPradesh;
            break;
        case "West Bengal":
            optionsList = WestBengal;
            break;
        case "Andaman and Nicobar Islands":
            optionsList = AndamanNicobar;
            break;
        case "Chandigarh":
            optionsList = Chandigarh;
            break;
        case "Dadar and Nagar Haveli":
            optionsList = DadraHaveli;
            break;
        case "Daman and Diu":
            optionsList = DamanDiu;
            break;
        case "Delhi":
            optionsList = Delhi;
            break;
        case "Lakshadweep":
            optionsList = Lakshadweep;
            break;
        case "Puducherry":
            optionsList = Puducherry;
            break;
    }
    for (var i = 0; i < optionsList.length; i++) {
        htmlString = htmlString + "<option value='" + optionsList[i] + "'>" + optionsList[i] + "</option>";
    }
    $("#inputDistrict").html(htmlString);
});








// Get today's date in YYYY-MM-DD format
const today = new Date().toISOString().split('T')[0];

// Set the max attribute to disable all future dates
document.getElementById('toDate').setAttribute('max', today);











let rowCount = 2; // Initialize row counter

function addRow() {
    // Create a unique ID for the row using the rowCount
    const rowId = `row-${rowCount}`;

    // Insert the new row into the DOM
    document.querySelector('#content').insertAdjacentHTML(
        'beforeend',
        `<div class="row" id="${rowId}">
            <div class="col-md-2">
                <div class="input-group form-floating date mb-4 datepickerr">
                    <input type="text"  class="form-control" id="fromdate-${rowCount}" name="FromDate[]" placeholder="" onchange="AnotherExperience('fromdate-${rowCount}')" required min="1900-01-01" max="2099-12-31">
                    <label class="form-label" for="fromdate-${rowCount}">From <small class="text-danger">*</small></label>
                 <span class="input-group-append">
                                                <span class="clndr-icon">
                                                  <i class="fa fa-calendar"></i>
                                                </span>
                                              </span>
                    </div>
                
            </div>
            <div class="col-md-2">
                <div class="input-group form-floating date mb-4 datepickerr">
                    <input type="text" class="form-control"  id="todate-${rowCount}" name="ToDate[]" placeholder="" onchange="updateExperience(); AnotherExperience('todate-${rowCount}')" required min="1900-01-01" max="2099-12-31">
                    <label class="form-label" for="todate-${rowCount}">To <small class="text-danger">*</small></label>
                  <span class="input-group-append">
                                                <span class="clndr-icon">
                                                  <i class="fa fa-calendar"></i>
                                                </span>
                                              </span>
               
               
                    </div>
               
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="duration-${rowCount}" name="Duration[]" placeholder="" readonly required>
                    <label class="form-label" for="duration-${rowCount}">Duration <small class="text-danger">*</small></label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="companyname-${rowCount}" name="CompaniesNames[]" placeholder="" required>
                    <label class="form-label" for="companyname-${rowCount}">Company Name <small class="text-danger">*</small></label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="designation-${rowCount}" name="Designations[]" placeholder="" required>
                    <label class="form-label" for="designation-${rowCount}">Designation <small class="text-danger">*</small></label>
                </div>
            </div>
            <div class="col-md-12" style="display:none;">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="WorkingHere[]" id="WorkingHere-${rowCount}">
                    <label class="form-check-label" for="WorkingHere-${rowCount}">Currently I'm Working here.</label>
                </div>
            </div>
            <div class="col-md-1 text-end">
                <div class="form-floating mb-4">
                    <button type="button" id="saveButton-${rowCount}" name="save" class="btn btn-lg btn-alt-danger fw-semibold" onclick="removeRow('${rowId}')">-</button>
                </div>
            </div>
        </div>`
    );

    $(function(){
        $('.datepickerr').datepicker({ dateFormat: 'yyyy-mm-dd'});
       
      });
    // Add event listener to the new 'To' date input
    const fromDateInput = document.getElementById(`fromdate-${rowCount}`);
    const toDateInput = document.getElementById(`todate-${rowCount}`);
    const TotalExperience = document.getElementById(`TotalExperience`);


    // Ensure both elements exist before attaching the event listener
    if (fromDateInput && toDateInput) {
        toDateInput.addEventListener('blur', function () {
            const fromDate = fromDateInput.value;
            const toDate = this.value;

            if (toDate && fromDate && toDate < fromDate) {
                // alert('Please ensure that the "To" date is not before the "From" date.');
                this.value = ''; // Optionally, clear the ToDate field
                TotalExperience.value = '';
            }
        });
    }

    rowCount++; // Increment the row counter
}



function removeRow(rowId) {
    const row = document.getElementById(rowId);
    if (row) {
        row.remove(); // Remove the row with the specified ID
    }
    updateExperience(); // Recalculate experience after removing a row
    // sendAjaxRequest(rowId);
}



// Variable to hold the calculated difference
let dateDifference = {
    years: 0,
    months: 0,
    days: 0
};

function AnotherExperience(id) {
    // Extract row number from the ID to construct the other ID
    const rowNumber = id.split('-')[1];
    const fromDateId = `fromdate-${rowNumber}`;
    const toDateId = `todate-${rowNumber}`;
    const durationId = `duration-${rowNumber}`;

    // Retrieve the input elements by their IDs
    const fromDateElement = document.getElementById(fromDateId);
    const toDateElement = document.getElementById(toDateId);
    const durationElement = document.getElementById(durationId);

    // Check if both date elements and the duration element exist
    if (fromDateElement && toDateElement && durationElement) {
        // Get the values of the input elements
        const fromDateValue = fromDateElement.value;
        const toDateValue = toDateElement.value;

        // Parse the dates
        const fromDate = new Date(fromDateValue);
        const toDate = new Date(toDateValue);

        // Check if both dates are valid
        if (fromDate && toDate && toDate >= fromDate) {
            // Calculate the difference
            let years = toDate.getFullYear() - fromDate.getFullYear();
            let months = toDate.getMonth() - fromDate.getMonth();
            let days = toDate.getDate() - fromDate.getDate();

            if (days < 0) {
                months--;
                days += new Date(fromDate.getFullYear(), fromDate.getMonth() + 1, 0).getDate();
            }

            if (months < 0) {
                years--;
                months += 12;
            }

            // Update the duration field with the calculated difference
            durationElement.value = `${years} Y ${months} M ${days} D`;

            // Check if the total experience is less than or equal to 7 years 0 months 0 days
            // if (years < 7 || (years === 7 && months === 0 && days === 0)) {
            //     alert('Total experience must be more than 7 Years 0 Months 0 Days.');
            //     // Optionally, hide or disable a button here if needed
            // }

            // Optionally, you can also log the result
            console.log(`Difference between '${fromDateValue}' and '${toDateValue}': ${years} Y ${months} M ${days} D`);

        } else {
            // Clear the duration field if dates are invalid
            durationElement.value = '';
            console.log(`Invalid date range or dates are not set correctly for IDs '${fromDateId}' and '${toDateId}'.`);
        }
    } else {
        console.log(`Element(s) with ID(s) '${fromDateId}', '${toDateId}', or '${durationId}' not found.`);
    }
}

// document.addEventListener('DOMContentLoaded', () => {
//     // Initial setup for existing inputs
//     document.querySelectorAll('input[type="date"]').forEach(input => {
//         input.addEventListener('change', updateExperience);
//     });
// });

let alertShown = false; // Flag to track if the alert has been shown

function updateExperience() {
    const fromDateInput = document.getElementById('fromdate');
    const toDateInput = document.getElementById('toDate');
    const durationInput = document.getElementById('duration');
    const totalExperienceInput = document.getElementById('TotalExperience');
    const saveButton = document.getElementById('saveButtons');
    const SubmitButtons = document.getElementById('SubmitButtons');
    // const errorElement = document.getElementById('expererror');
    const experienceInput = document.getElementById('ExperienceCurrentCompany');

    const fromDate = new Date(fromDateInput.value);
    const toDate = new Date(toDateInput.value);

    if (fromDateInput.value && toDateInput.value) {
        if (toDate >= fromDate) {
            let years = toDate.getFullYear() - fromDate.getFullYear();
            let months = toDate.getMonth() - fromDate.getMonth();
            let days = toDate.getDate() - fromDate.getDate();

            if (days < 0) {
                months--;
                days += new Date(fromDate.getFullYear(), fromDate.getMonth() + 1, 0).getDate();
            }

            if (months < 0) {
                years--;
                months += 12;
            }

            // Update the duration field
            durationInput.value = `${years} Y ${months} M ${days} D`;

            // Set the calculated experience into the TotalExperience input field
            totalExperienceInput.value = `${years} Years ${months} Months ${days} Days`;
            experienceInput.value = `${years} Years ${months} Months ${days} Days`;

            // Calculate total experience from all rows
            let totalYears = 0, totalMonths = 0, totalDays = 0;

            document.querySelectorAll('[id^="row-"]').forEach((row) => {
                const fromDate = row.querySelector('input[name="FromDate[]"]').value;
                const toDate = row.querySelector('input[name="ToDate[]"]').value;
                const durationField = row.querySelector('input[name="Duration[]"]');

                if (fromDate && toDate) {
                    const from = new Date(fromDate);
                    const to = new Date(toDate);
                    let years = to.getFullYear() - from.getFullYear();
                    let months = to.getMonth() - from.getMonth();
                    let days = to.getDate() - from.getDate();

                    if (days < 0) {
                        months--;
                        days += new Date(from.getFullYear(), from.getMonth() + 1, 0).getDate();
                    }
                    if (months < 0) {
                        years--;
                        months += 12;
                    }

                    durationField.value = `${years} Years ${months} Months ${days} Days`;

                    totalYears += years;
                    totalMonths += months;
                    totalDays += days;
                }
            });

            totalMonths += Math.floor(totalDays / 30.44);
            totalDays = Math.floor(totalDays % 30.44);
            totalYears += Math.floor(totalMonths / 12);
            totalMonths = totalMonths % 12;

            const totalExperienceField = document.getElementById('TotalExperience');
            totalExperienceField.value = `${totalYears} Years ${totalMonths} Months ${totalDays} Days`;

            // Validate the conditions
            if (years >= 3 && totalYears >= 7) {
                saveButton.style.display = 'block';
                // SubmitButtons.hide();
                document.getElementById('SubmitButtons').style.display = 'none';
                alertShown = false; // Reset the flag when conditions are met
            } else {
                if (!alertShown) { // Check if alert has not been shown
                    alert('Total experience of at least 7 years, and experience in the current organisation should be at least 3 years.');
                    alertShown = true; // Set flag to true after showing the alert
                }
                saveButton.style.display = 'none';
                document.getElementById('SubmitButtons').style.display = 'none';

            }
        } else {
            durationInput.value = ''; // Clear the duration input field
            totalExperienceInput.value = ''; // Clear the total experience input field
            saveButton.style.display = 'none'; // Hide the submit button
            SubmitButtons.style.display = 'none'; // Hide the submit button

            alertShown = false; // Reset the flag
        }
    } else {
        durationInput.value = ''; // Clear the duration input field
        totalExperienceInput.value = ''; // Clear the total experience input field
        saveButton.style.display = 'none'; // Hide the submit button

        alertShown = false; // Reset the flag
    }
}

// Attach event listener to input fields
document.getElementById('fromdate').addEventListener('blur', updateExperience);
document.getElementById('toDate').addEventListener('blur', updateExperience);



document.addEventListener('DOMContentLoaded', function () {
    const totalExperienceInput = document.getElementById('TotalExperience');
    const submitButton = document.getElementById('SubmitButtons');

    // Extract the years from the TotalExperience input
    const experienceText = totalExperienceInput.value;
    const yearsMatch = experienceText.match(/(\d+)\s*Years/);

    if (yearsMatch) {
        const years = parseInt(yearsMatch[1], 10);

        if (years < 3 || years < 7) {
            submitButton.style.display = 'none'; // Hide the submit button
        } else {
            // document.getElementById('SubmitButtons').style.display = 'block'; // Show the submit button
        }
    } else {
        submitButton.style.display = 'none'; // Hide the submit button if no valid experience is found
    }
});



// PPT Validation
document.getElementById('PPTAvailable').addEventListener('change', function (event) {
    const file = event.target.files[0];

    if (file) {
        const validExtensions = ['.pptx'];
        const mimeType = 'application/vnd.openxmlformats-officedocument.presentationml.presentation';
        const fileName = file.name;

        // Check for double file extensions
        const hasDoubleExtension = /\.(?!pptx$)[\w]{2,4}$/.test(fileName);
        if (hasDoubleExtension) {
            alert('Please select a file with a single extension and a .pptx extension.');
            event.target.value = ''; // Clear the file input
            return;
        }

        // Check file extension
        const fileExtension = fileName.slice(((fileName.lastIndexOf(".") - 1) >>> 0) + 2).toLowerCase();
        if (!validExtensions.includes(`.${fileExtension}`)) {
            alert('Please select a .pptx file.');
            event.target.value = ''; // Clear the file input
            return;
        }

        // Check MIME type
        if (file.type !== mimeType) {
            alert('Invalid file type. Please select a .pptx file.');
            event.target.value = ''; // Clear the file input
            return;
        }

        // Optionally, check file signature (magic number)
        const reader = new FileReader();
        reader.onload = function (e) {
            const arrayBuffer = e.target.result;
            const view = new Uint8Array(arrayBuffer);
            // PPTX files typically start with 50 4B 03 04 (PK) in hexadecimal
            const magicNumber = [0x50, 0x4B, 0x03, 0x04];
            const isValidSignature = magicNumber.every((byte, index) => byte === view[index]);
            if (!isValidSignature) {
                alert('Invalid file signature. Please select a valid .pptx file.');
                event.target.value = ''; // Clear the file input
            }
        };
        reader.readAsArrayBuffer(file);
    }
});

// Overall Experience Validation
document.getElementById('OverallExperience').addEventListener('change', function (event) {
    const file = event.target.files[0];

    if (file) {
        const validExtensions = ['.pdf'];
        const mimeType = 'application/pdf';
        const fileName = file.name;

        // Check for double file extensions
        const hasDoubleExtension = /\.(?!pdf$)[\w]{2,4}$/.test(fileName);
        if (hasDoubleExtension) {
            alert('Please select a file with a single extension and a .pdf extension.');
            event.target.value = ''; // Clear the file input
            return;
        }

        // Check file extension
        const fileExtension = fileName.slice(((fileName.lastIndexOf(".") - 1) >>> 0) + 2).toLowerCase();
        if (!validExtensions.includes(`.${fileExtension}`)) {
            alert('Please select a .pdf file.');
            event.target.value = ''; // Clear the file input
            return;
        }

        // Check MIME type
        if (file.type !== mimeType) {
            alert('Invalid file type. Please select a .pdf file.');
            event.target.value = ''; // Clear the file input
            return;
        }

        // Optionally, check file signature (magic number)
        const reader = new FileReader();
        reader.onload = function (e) {
            const arrayBuffer = e.target.result;
            const view = new Uint8Array(arrayBuffer);
            // PDF files typically start with 25 50 44 46 (PDF) in hexadecimal
            const magicNumber = [0x25, 0x50, 0x44, 0x46];
            const isValidSignature = magicNumber.every((byte, index) => byte === view[index]);
            if (!isValidSignature) {
                alert('Invalid file signature. Please select a valid .pdf file.');
                event.target.value = ''; // Clear the file input
            }
        };
        reader.readAsArrayBuffer(file);
    }
});



$(document).ready(function () {
    $('#AvrageBusinessTurnover3Year').on('change', function () {
        // Get the input value
        var turnoverInput = $(this).val();

        // Remove commas and convert to a number
        var turnover = parseFloat(turnoverInput.replace(/,/g, ''));

        // Define the minimum value (2000 crore in numeric form)
        var minimumValue = 2000;

        if (isNaN(turnover) || turnover < minimumValue) {
            // Show an alert and clear the input value
            // alert('The average business turnover for 3 years must be at least 2000 crore.');
            alert('Turnover for latest 3 year.');
            $(this).val(''); // Clear the input value
            $(this).focus();
        }
    });
});






document.getElementById('ProjectDetails').addEventListener('change', function (event) {
    const file = event.target.files[0];

    if (!file) {
        alert('No file selected.');
        return;
    }

    // Check file size (10 MB in bytes)
    const maxSize = 10 * 1024 * 1024; // 10 MB
    if (file.size > maxSize) {
        alert('File size exceeds 10 MB.');
        event.target.value = ''; // Clear the file input
        return;
    }

    // Check file type (must be PDF)
    const allowedType = 'application/pdf';
    if (file.type !== allowedType) {
        alert('Invalid file type. Only PDF files are allowed.');
        event.target.value = ''; // Clear the file input
        return;
    }

    // Check for double extension
    const fileName = file.name;
    const extensionPattern = /\.(pdf)$/i;
    if (!extensionPattern.test(fileName)) {
        alert('Invalid file extension.');
        event.target.value = ''; // Clear the file input
        return;
    }

    // Check file signature (PDF files start with %PDF)
    const reader = new FileReader();
    reader.onload = function (e) {
        const uint8Array = new Uint8Array(e.target.result);
        const signature = String.fromCharCode.apply(null, uint8Array.slice(0, 4));

        if (signature !== '%PDF') {
            alert('Invalid file signature. The file is not a valid PDF.');
            event.target.value = ''; // Clear the file input
            return;
        }

    };

    // Read the first few bytes of the file to check the signature
    reader.readAsArrayBuffer(file.slice(0, 4));
});











document.getElementById('3YearCompanyAudit').addEventListener('change', function () {
    const file = this.files[0];

    if (file) {
        // Check if the file is a PDF
        const fileType = file.type;
        if (fileType !== 'application/pdf') {
            alert('Please upload a PDF file.');
            this.value = ''; // Clear the input
            return;
        }

        // Check if the file size is at most 2 MB
        const maxSize = 2 * 1024 * 1024; // 2 MB in bytes
        if (file.size > maxSize) {
            alert('The file size must not exceed 2 MB.');
            this.value = ''; // Clear the input
            return;
        }

        const fileName = file.name;
        const doubleExtensionPattern = /\.[^.]+\.pdf$/i;
        if (doubleExtensionPattern.test(fileName)) {
            alert('The file name should not contain double extensions (e.g., file.pdf.pdf).');
            this.value = ''; // Clear the input
            return;
        }


        // Check file signature (PDF files start with %PDF)
        const reader = new FileReader();
        reader.onload = function (e) {
            const uint8Array = new Uint8Array(e.target.result);
            const signature = String.fromCharCode.apply(null, uint8Array.slice(0, 4));

            if (signature !== '%PDF') {
                alert('Invalid file signature. The file is not a valid PDF.');
                event.target.value = ''; // Clear the file input
                return;
            }
        };
    }
});



document.getElementById('AppointmentLetter').addEventListener('change', function () {
    const file = this.files[0];

    if (file) {
        // Check if the file is a PDF
        const fileType = file.type;
        if (fileType !== 'application/pdf') {
            alert('Please upload a PDF file.');
            this.value = ''; // Clear the input
            return;
        }

        // Check if the file size is at most 2 MB
        const maxSize = 2 * 1024 * 1024; // 2 MB in bytes
        if (file.size > maxSize) {
            alert('The file size must not exceed 2 MB.');
            this.value = ''; // Clear the input
            return;
        }

        const fileName = file.name;
        const doubleExtensionPattern = /\.[^.]+\.pdf$/i;
        if (doubleExtensionPattern.test(fileName)) {
            alert('The file name should not contain double extensions (e.g., file.pdf.pdf).');
            this.value = ''; // Clear the input
            return;
        }


        // Check file signature (PDF files start with %PDF)
        const reader = new FileReader();
        reader.onload = function (e) {
            const uint8Array = new Uint8Array(e.target.result);
            const signature = String.fromCharCode.apply(null, uint8Array.slice(0, 4));

            if (signature !== '%PDF') {
                alert('Invalid file signature. The file is not a valid PDF.');
                event.target.value = ''; // Clear the file input
                return;
            }
        };
    }
});


function printbtn() {
    const printbtn = document.getElementById('printButton');

    // Hide the button
    printbtn.style.display = 'none';

    // Trigger print after a small delay
    setTimeout(function () {
        window.print();
        // Show the button again after printing
        setTimeout(function () {
            printbtn.style.display = '';
        }, 100); // 0.1 seconds delay to show the button again
    }, 100); // 0.1 seconds delay before printing
}


// document.getElementById('ExperienceCurrentCompany').addEventListener('change', function (event) {
//     var experienceInput = document.getElementById('ExperienceCurrentCompany').value;
//     var TotalExperience = document.getElementById('TotalExperience').value;
//     var submitButton = document.getElementById('saveButtons');

//     // Extract the number of years from TotalExperience
//     var years = parseFloat(TotalExperience.split(" ")[0]); // Extract the number before "Years" and convert to float

//     // Check if the input is empty or not a valid number
//     if (experienceInput === '' || isNaN(parseFloat(experienceInput))) {
//         alert('Please enter a valid number for experience.');
//         document.getElementById('ExperienceCurrentCompany').value = ''; // Clear the input field
//         submitButton.style.display = 'none'; // Hide the submit button
//     } else {
//         var experience = parseFloat(experienceInput);

//         // Check if experience is less than 3 and total experience is less than 7
//         if (experience < 3 || years < 7) {
//             alert('Current organisation experience should be at least 3 years and total experience should be at least 7 years.');
//             document.getElementById('ExperienceCurrentCompany').value = ''; // Clear the input field
//             submitButton.style.display = 'none'; // Hide the submit button
//         } else {
//             submitButton.style.display = 'block'; // Show the submit button if experience is valid
//         }
//     }
// });



// document.getElementById('ExperienceCurrentCompany').addEventListener('change', function () {
//     var experienceInput = document.getElementById('ExperienceCurrentCompany').value;
//     var TotalExperience = document.getElementById('TotalExperience');
//     var submitButton = document.getElementById('saveButtons');

//     // Extract the number of years from TotalExperience
//     var years = 0;
//     if (TotalExperience.value) {
//         var match = TotalExperience.value.match(/(\d+(\.\d+)?)\s*Years/);
//         if (match) {
//             years = parseFloat(match[1]);
//         }
//     }

//     // Check if the input is empty or not a valid number
//     if (experienceInput === '' || isNaN(parseFloat(experienceInput))) {
//         alert('Please enter a valid number for experience.');
//         document.getElementById('ExperienceCurrentCompany').value = ''; // Clear the input field
//         submitButton.style.display = 'none'; // Hide the submit button
//     } else {
//         var experience = parseFloat(experienceInput);

//         // Initialize an empty message
//         var message = '';

//         // Check if the current organisation experience is less than 3 years
//         if (experience < 3) {
//             message += 'Current organisation experience should be at least 3 years. ';
//             // Focus on the ExperienceCurrentCompany input field
//             document.getElementById('ExperienceCurrentCompany').focus();
//         }

//         // Check if the total experience is less than 7 years
//         if (years < 7) {
//             message += 'Total experience should be at least 7 years.';
//             // Focus on the TotalExperience input field if necessary
//             if (TotalExperience) {
//                 TotalExperience.focus();
//             }
//         }

//         // If there are any messages, show the alert and hide the submit button
//         if (message) {
//             alert(message.trim());
//             document.getElementById('ExperienceCurrentCompany').value = ''; // Clear the input field
//             submitButton.style.display = 'none'; // Hide the submit button
//         } else {
//             submitButton.style.display = 'block'; // Show the submit button if all conditions are valid
//         }
//     }
// });



document.getElementById('WorkingHere').addEventListener('click', function () {
    var duration = document.getElementById('duration').value;
    var ExperienceCurrentCompany = document.getElementById('ExperienceCurrentCompany');

    // Set the value of the ExperienceCurrentCompany input to the duration value
    ExperienceCurrentCompany.value = duration;
});


