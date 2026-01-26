@extends('template.template_1')

@section('title', 'Questionnaire - Sustainability Universitas Airlangga')

@section('css_page')

@endsection

@section('content')
    <form action="#" method="post" id="form_submit" class="row g-4">
        @csrf
        <input type="hidden" name="idusers" value="{{ $userdata['idusers'] }}">
        <input type="hidden" name="tipe_ques" value="{{ $ques }}">
        <input type="hidden" name="sesi" value="{{ $sesi }}">

        <input type="hidden" name="nextsesi" id="nextsesi" value="3">


    </form>

    <!-- Action buttons -->
    <div class="col-12 mt-3">
        <div class="d-flex flex-column flex-sm-row gap-2 justify-content-end" id="action_buttons">
            <button type="reset" class="btn btn-danger" onclick="submit(1, 'b')">Back</button>
            <button type="submit" class="btn btn-success" onclick="submit(3, 'n')">Next</button>
        </div>
    </div>
@endsection

@section('js_page')
    <script>
        function submit(nextsesi, direction) {
            document.getElementById('nextsesi').value = nextsesi;
            if(direction == 'n'){
                document.getElementById('action_buttons').innerHTML = '<div class="d-flex justify-content-center"><div class="spinner-border text-success" role="status"><span class="visually-hidden">Loading...</span></div></div>';
            }
            else{
                document.getElementById('action_buttons').innerHTML = '<div class="d-flex justify-content-center"><div class="spinner-border text-danger" role="status"><span class="visually-hidden">Loading...</span></div></div>';
            }
            document.getElementById('form_submit').submit();
        }
    </script>
@endsection