@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <section class="our-couriers-section py-5">
        <div class="container">
            <div class="container d-flex flex-column flex-lg-row align-items-center">
                <!-- First column -->
                <div class="col-7 text-center text-lg-start mb-5 mb-lg-0">
                    <h2 class="section-title mb-5">Наши курьеры</h2>
                    <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3">
                        <!-- Blocks with logos -->
                        @php
                            $couriers = ['dpd','gls','dhl','shopify','woo','prestashop','ppl','posta','magento'];
                        @endphp
                        @foreach($couriers as $i)
                            <div class="logo-block d-flex align-items-center justify-content-center">
                                <img src="{{ asset('images/' . $i . '.png') }}" alt="Courier Logo" class="img-fluid">
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Second column -->
                <div class="col-5">
                    <div class="image-wrapper">
                        <img src="{{ asset('images/box.jpg') }}" alt="Box Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="form-section py-5">
        <div class="container-fluid d-flex align-items-center justify-content-center">
            <div class="row w-100">
                <div class="col-lg-6 mx-auto">
                    <div class="form-wrapper">
                        <div id="form-message" class="alert d-none"></div>
                        <form action="{{ route('form.submit') }}" method="POST" id="mainForm" class="p-4">
                            @csrf
                            <h2 class="form-title mb-3">Вы ищете лучшее предложение?</h2>
                            <p class="form-description mb-4">
                                Оставьте заявку и наш менеджер свяжется с вами для консультации.
                            </p>

                            <!-- Name, Surname, Patronymic -->
                            <div class="d-flex gap-3 mb-3">
                                <div class="flex-grow-1">
                                    <label for="name" class="form-label">Имя</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                    <div class="error-message text-danger" style="min-height: 1rem;"></div>
                                </div>
                                <div class="flex-grow-1">
                                    <label for="surname" class="form-label">Фамилия</label>
                                    <input type="text" id="surname" name="surname" class="form-control" required>
                                    <div class="error-message text-danger" style="min-height: 1rem;"></div>
                                </div>
                                <div class="flex-grow-1">
                                    <label for="patronymic" class="form-label">Отчество</label>
                                    <input type="text" id="patronymic" name="patronymic" class="form-control">
                                    <div class="error-message text-danger" style="min-height: 1rem;"></div>
                                </div>
                            </div>

                            <!-- Birthdate -->
                            <div class="mb-3">
                                <label for="birthdate" class="form-label">Дата рождения</label>
                                <input type="date" id="birthdate" name="birthdate" class="form-control" required>
                                <div class="error-message text-danger" style="min-height: 1rem;"></div>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control">
                                <div class="error-message text-danger" style="min-height: 1rem;"></div>
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Телефон</label>
                                <div id="phone-container">
                                    <div class="d-flex align-items-center mb-2">
                                        <select name="country_code[]" class="form-control w-auto me-2">
                                            <option value="+375">🇧🇾 +375</option>
                                            <option value="+7">🇷🇺 +7</option>
                                            <option value="+1">🇺🇸 +1</option>
                                        </select>
                                        <input type="tel" name="phone[]" class="form-control flex-grow-1">
                                        <button type="button" class="btn btn-add-phone ms-2 text-white border-0">+</button>
                                    </div>
                                </div>
                                <div class="error-message text-danger" style="min-height: 1rem;"></div>
                            </div>

                            <!-- Marital Status -->
                            <div class="mb-3">
                                <label for="marital_status" class="form-label">Семейное положение</label>
                                <select id="marital_status" name="marital_status" class="form-control" required>
                                    <option value="single">Холост/не замужем</option>
                                    <option value="married">Женат/замужем</option>
                                    <option value="divorced">В разводе</option>
                                    <option value="widowed">Вдовец/вдова</option>
                                </select>
                                <div class="error-message text-danger" style="min-height: 1rem;"></div>
                            </div>

                            <!-- About -->
                            <div class="mb-3">
                                <label for="about" class="form-label">О себе</label>
                                <textarea id="about" name="about" class="form-control" rows="1" style="max-height: 7rem;"></textarea>
                                <div class="error-message text-danger" style="min-height: 1rem;"></div>
                            </div>

                            <!-- Checkbox and Submit button -->
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <input type="checkbox" id="rules" name="rules" class="form-check-input" required>
                                    <label for="rules" class="form-check-label">Я ознакомился с правилами</label>
                                    <div class="error-message text-danger" style="min-height: 1rem;"></div>
                                </div>
                                <button type="submit" id="submitBtn" class="btn submit-btn" disabled>Отправить</button>
                            </div>

                            <!-- Combined Email/Phone Error -->
                            <div class="error-message text-danger mt-2" id="email-phone-error" style="min-height: 1rem;"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
