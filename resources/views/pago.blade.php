@extends('layout')

@section('contenido')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">

    <h2 class="text-2xl font-bold text-blue-600 mb-4">Pagar juego</h2>

    @if(session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="text-red-600 mb-4">{{ session('error') }}</div>
    @endif

    <form action="{{ route('pagar') }}" method="POST" id="payment-form">
        @csrf

     
        <p> Cantidad en euros </p>
        <input type="number" name="amount">

        <!-- Elemento de Stripe -->
        <div id="card-element" class="mb-4 p-3 border border-gray-300 rounded"></div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Pagar
        </button>
    </form>

</div>

<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe("{{ config('services.stripe.key') }}");
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const {token, error} = await stripe.createToken(card);

        if (error) {
            alert(error.message);
        } else {
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }
    });
</script>
@endsection
