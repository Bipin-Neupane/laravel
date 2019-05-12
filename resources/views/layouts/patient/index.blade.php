@include('layouts.partials.header')

<div class="text-white text-center py-5" id="intro" style="background: #3147A4">
    <div class="container px-5">
        <h1 style="font-family:Arial, Helvetica, sans-serif">
            ASK A DOCTOR ONLINE
        </h1>
        <p class="lead"> Get treatment from doctor online. Select doctors based on your health issues for online
            consultation through a simple chat or audio chat or video chat.</p>
    </div>
</div>

<div class="container py-5" is="search">
    <div class="container-fluid lead">
        <form action="#" method="POST" role="search" class="mx-auto w-50">
            @csrf
            <div class="input-group d-flex">
                <input type="text" class="form-control align-self-center" name="q" placeholder="Search doctors">
                <button type="submit" class="btn btn-md btn-default align-self-center my-0">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<div class="py-5 blue lighten-5" id="user_manual">
    <div class="container">
        <h3 class=""> User Manual</h3>
        <div class="container">
            <ul>
                <li>
                    <p> <strong>Step 1:</strong> Select Doctor's Category to find your specific doctor.</p>
                    <img src="{{asset('img/step1.png')}}" class="img-fluid" alt="">
                </li>
                <li>
                    <p>
                        <strong>Step 2:</strong> After selecting Doctor's Category, you will be redirected to respective
                        doctor's category page where you will be able to see all the doctor's profile. Furthermore,
                        based on
                        patient's rating, you will be provided with best reccommendations.
                    </p>
                    <img src="{{asset('img/aaa.jpg')}}" class="img-fluid" alt="">
                </li>
                <li>
                    <p> <strong>Step 3:</strong> Choose one who you want to be your caretaker. You will be asked to
                        confirm
                        the treatment process.
                    </p>
                    <img src="{{asset('img/step1.png')}}" class="img-fluid" alt="">
                </li>
                <li>
                    <p> <strong>Step 1:</strong> Once you confirm the selection process, you should wait for doctor's
                        schedule for your online treatment. Doctor will see your request and provide you a date and time
                        for
                        your treatment. </p>
                    <img src="{{asset('img/step1.png')}}" class="img-fluid" alt="">

                </li>

            </ul>
        </div>
    </div>
</div>