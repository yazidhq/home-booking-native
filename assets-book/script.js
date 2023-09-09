// JavaScript for handling form submission and displaying payment and invoice containers

// Get form elements
const bookingForm = document.getElementById("booking-form");
const paymentContainer = document.getElementById("payment-container");
const invoiceContainer = document.getElementById("invoice-container");
const totalAmountSpan = document.getElementById("total-amount");
const invoiceNameSpan = document.getElementById("invoice-name");
const invoicePhoneSpan = document.getElementById("invoice-phone");
const invoiceEmailSpan = document.getElementById("invoice-email");
const invoiceHouseTypeSpan = document.getElementById("invoice-house-type");
const invoiceBookingAmountSpan = document.getElementById("invoice-booking-amount");
const bookingButton = document.getElementById("booking-button");
const paymentButton = document.getElementById("payment-button");
const printInvoiceButton = document.getElementById("print-invoice-button");

// Add event listener for form submission
bookingForm.addEventListener("submit", function (event) {
  event.preventDefault();
  showPaymentContainer();
});

// Function to show the payment container
function showPaymentContainer() {
  const bookingAmount = parseInt(bookingForm.elements["booking-amount"].value);
  if (bookingAmount < 1000000) {
    alert("Nominal booking harus minimal Rp 1,000,000");
    return;
  }

  totalAmountSpan.textContent = "Rp " + bookingAmount.toLocaleString();
  paymentContainer.classList.remove("hidden");
  bookingForm.classList.add("hidden");
}

// Add event listener for payment button click
paymentButton.addEventListener("click", function () {
  showInvoiceContainer();
});

// Function to show the invoice container
function showInvoiceContainer() {
  const name = bookingForm.elements["name"].value;
  const phone = bookingForm.elements["phone"].value;
  const email = bookingForm.elements["email"].value;
  const houseType = bookingForm.elements["house-type"].value;
  const bookingAmount = parseInt(bookingForm.elements["booking-amount"].value);

  invoiceNameSpan.textContent = name;
  invoicePhoneSpan.textContent = phone;
  invoiceEmailSpan.textContent = email;
  invoiceHouseTypeSpan.textContent = houseType;
  invoiceBookingAmountSpan.textContent = "Rp " + bookingAmount.toLocaleString();

  paymentContainer.classList.add("hidden");
  invoiceContainer.classList.remove("hidden");
}

// Add event listener for print invoice button click
printInvoiceButton.addEventListener("click", function () {
  printInvoice();
});

// Function to print the invoice
function printInvoice() {
  // Your custom logic to print the invoice
}