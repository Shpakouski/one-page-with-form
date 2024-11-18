@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <div class="container">
        <!-- Header -->
        <header class="my-5 text-center">
            <h1 class="fw-bold">Наши курьеры</h1>
            <div class="d-flex flex-wrap justify-content-center gap-4 mt-3">
                <img src="{{ asset('images/dpd.svg') }}" alt="DPD" class="img-fluid" style="max-width: 100px;">
                <img src="{{ asset('images/gls.svg') }}" alt="GLS" class="img-fluid" style="max-width: 100px;">
                <img src="{{ asset('images/dhl.svg') }}" alt="DHL" class="img-fluid" style="max-width: 100px;">
                <img src="{{ asset('images/shopify.svg') }}" alt="Shopify" class="img-fluid" style="max-width: 100px;">
            </div>
        </header>

        <!-- Form -->
        <section class="bg-light p-5 rounded">
            <h2 class="text-center mb-4">Ищете лучшую оферту?</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('form.submit') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <!-- Name -->
                    <div class="col-md-4 mb-3">
                        <label for="first_name" class="form-label">Имя *</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                    </div>
                    <!-- Last name -->
                    <div class="col-md-4 mb-3">
                        <label for="last_name" class="form-label">Фамилия *</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                    </div>
                    <!-- Patronymic -->
                    <div class="col-md-4 mb-3">
                        <label for="middle_name" class="form-label">Отчество</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name') }}">
                    </div>
                </div>

                <div class="row">
                    <!-- Birth date -->
                    <div class="col-md-6 mb-3">
                        <label for="birth_date" class="form-label">Дата рождения *</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" required>
                    </div>
                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>
                </div>

                <!-- Phones -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Телефон *</label>
                    <div id="phoneContainer">
                        <div class="d-flex align-items-center mb-2">
                            <select class="form-select" name="phone[0][country_code]" style="width: 100px;">
                                <option value="+375">+375</option>
                                <option value="+7">+7</option>
                            </select>
                            <input type="tel" class="form-control ms-2" name="phone[0][number]" placeholder="123 456 789" required>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm" id="addPhone">+ Добавить номер</button>
                </div>

                <!-- Marital status -->
                <div class="mb-3">
                    <label for="marital_status" class="form-label">Семейное положение *</label>
                    <select class="form-select" id="marital_status" name="marital_status" required>
                        <option value="">Выберите...</option>
                        <option value="single">Холост/не замужем</option>
                        <option value="married">Женат/замужем</option>
                        <option value="divorced">В разводе</option>
                        <option value="widowed">Вдовец/вдова</option>
                    </select>
                </div>

                <!-- About -->
                <div class="mb-3">
                    <label for="about" class="form-label">О себе</label>
                    <textarea class="form-control" id="about" name="about" rows="5" maxlength="1000">{{ old('about') }}</textarea>
                </div>

                <!-- Checkbox -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="agree" name="agree" required>
                    <label class="form-check-label" for="agree">Я ознакомился с правилами *</label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary" id="submitButton" disabled>Отправить</button>
            </form>
        </section>
    </div>
@endsection