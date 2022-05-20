<div style="position: absolute; left: 0; top: 0; width: 100%">
    @if(Session::has('success'))
        <div class="alert-float alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="onButtonPress()">x</button>
            {{Session::get('success')}}
        </div>
    @endif

    @if(Session::has('error'))
        <div class="alert-float alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="onButtonPress()">x</button>
            {{Session::get('error')}}
        </div>
    @endif
    @if(!empty($errors) && count($errors) > 0)
        <div class="alert-float alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="onButtonPress()">x</button>
            {{$errors->first()}}
        </div>
    @endif


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                document.querySelector('.alert').style.display = 'none';
            }, 1500)
        })
        function onButtonPress() {

        }
    </script>
</div>
