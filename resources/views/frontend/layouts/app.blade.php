<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Processing Free Loan | Loan Without Processing Fee in India')</title>
    <meta name="description" content="@yield('meta_description', 'Compare and apply for Personal Loans, Business Loans, Car Loans, Doctor & CA Loans from 23+ leading Banks and NBFCs with Zero Processing Fee offers.')">
    <meta name="keywords" content="processing free loan, zero processing fee loan, personal loan without processing fee, business loan zero fee, doctor loan, ca loan, car loan offers india">
    <meta name="author" content="ProcessingFreeLoan.com">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#062B59">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Processing Free Loan | Loan Without Processing Fee')">
    <meta property="og:description" content="@yield('meta_description', 'Compare and apply for Personal, Business, Car, and Professional Loans from leading Banks and NBFCs in India.')">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'Processing Free Loan')">
    <meta property="twitter:description" content="@yield('meta_description', 'Compare and apply for loans with Zero Processing Fee offers.')">
    <meta property="twitter:image" content="{{ asset('images/logo.png') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Vite Styles and Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="bg-[#F5F9FF] text-[#102B50] font-sans antialiased selection:bg-[#12C878] selection:text-white"
      x-data="{
          enquiryModalOpen: false,
          selectedLoan: 'personal-loan',
          selectedBank: '',
          loanAmount: '',
          openEnquiry(loan = 'personal-loan', bank = '', amount = '') {
              this.selectedLoan = loan;
              this.selectedBank = bank;
              if (amount) this.loanAmount = amount;
              this.enquiryModalOpen = true;
              setTimeout(() => { if (window.createLucideIcons) window.createLucideIcons(); }, 50);
          },
          closeEnquiry() {
              this.enquiryModalOpen = false;
          }
      }"
      @open-modal.window="openEnquiry($event.detail.loan, $event.detail.bank, $event.detail.amount)">

    <!-- Section 01: Top Information Bar -->
    @include('frontend.sections.section-01-topbar')

    <!-- Section 02: Main Sticky Navigation Header -->
    @include('frontend.sections.section-02-navbar')

    <!-- Main Page Content -->
    <main id="main-content">
        @yield('content')
    </main>

    <!-- Section 17: Premium Deep Navy Footer -->
    @include('frontend.sections.section-17-footer')

    <!-- Global Lead Enquiry Modal -->
    @include('frontend.components.modal-enquiry')

    @stack('scripts')
</body>
</html>
