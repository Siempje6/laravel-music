@extends('layouts.app')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Profile') }}
    </h2>
</x-slot>


<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f9fafb;
        color: #1f2937;
    }

    .py-12 {
        padding-top: 3rem;
        padding-bottom: 3rem;
    }

    .bg-white {
        background-color: #ffffff;
    }

    .shadow {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .sm\:rounded-lg {
        border-radius: 0.5rem;
    }

    .p-4,
    .sm\:p-8 {
        padding: 1rem;
    }

    .sm\:p-8 {
        padding: 2rem;
    }

    .max-w-7xl {
        max-width: 80rem;
        margin-left: auto;
        margin-right: auto;
    }

    .max-w-xl {
        max-width: 36rem;
    }

    h2.text-lg {
        font-size: 1.125rem;
        font-weight: 600;
        color: #111827;
    }

    p.text-sm {
        font-size: 0.875rem;
        color: #6b7280;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        padding: 0.5rem 0.75rem;
        width: 100%;
        font-size: 1rem;
        color: #111827;
        background-color: #fff;
        transition: border-color 0.2s ease;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #6366f1;
        outline: none;
    }

    .x-primary-button,
    .btn-primary {
        background-color: #6366f1;
        color: #ffffff;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.2s ease;
        border: none;
    }

    .x-primary-button:hover,
    .btn-primary:hover {
        background-color: #4f46e5;
    }

    .x-secondary-button {
        background-color: #e5e7eb;
        color: #1f2937;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        cursor: pointer;
        border: none;
        transition: background 0.2s ease;
    }

    .x-secondary-button:hover {
        background-color: #d1d5db;
    }

    .x-danger-button {
        background-color: #ef4444;
        color: #fff;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        cursor: pointer;
        border: none;
        transition: background 0.2s ease;
    }

    .x-danger-button:hover {
        background-color: #dc2626;
    }

    .space-y-6>*+* {
        margin-top: 1.5rem;
    }

    .mt-6 {
        margin-top: 1.5rem;
    }

    .toast {
        position: fixed;
        top: 25px;
        right: 25px;
        background-color: #111827;
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 0.5rem;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
        z-index: 1000;
    }

    .toast.show {
        opacity: 1;
        pointer-events: auto;
    }

    .modal {
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fff;
        padding: 2rem;
        border-radius: 0.5rem;
    }

    @media (max-width: 768px) {

        .max-w-7xl,
        .max-w-xl {
            max-width: 100%;
            padding: 0 1rem;
        }
    }

</style>
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
@endsection