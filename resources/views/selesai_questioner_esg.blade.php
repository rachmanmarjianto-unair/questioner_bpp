@extends('template.template_2')

@section('title', 'Questionnaire - ESG Universitas Airlangga')

@section('css_page')

@endsection

@section('content')
    <div class="container-fluid vh-100 ">
        <div class="text-center">
            <p><h3 class="h3 mb-1">Terima kasih atas kesediaan Bapak/Ibu/Saudara dalam mengisi survei ini. Partisipasi yang diberikan sangat berarti dan akan digunakan sebagai bahan evaluasi serta peningkatan kualitas layanan Universitas Airlangga ke depan.</h3></p>
            <p class="text-muted mb-0">Thank you for your willingness to complete this survey. Your participation is greatly appreciated and will be used as valuable input for evaluation and the continuous improvement of Universitas Airlangga’s service quality in the future.</p>
        </div>
        <div class="text-center mt-3">
            <p><h4>Redirecting to Home Page...</h4></p>
            <p id="countdown">5</p>
        </div>
    </div>

    
    <form action="{{ route('home') }}" id="form_submit" class="row g-4">
        
    </form>
    
@endsection

@section('js_page')

    <script>
        let countdownNumber = 5;
        const countdownElement = document.getElementById('countdown');

        const countdownInterval = setInterval(() => {
            countdownNumber--;
            countdownElement.textContent = countdownNumber;

            if (countdownNumber <= 0) {
                clearInterval(countdownInterval);
                document.getElementById('form_submit').submit();
            }
        }, 1000);
    </script>

@endsection