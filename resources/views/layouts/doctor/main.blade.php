<div class="text-white text-center py-5" id="intro"
    style="background:url('https://mdbootstrap.com/img/Photos/Others/images/37.jpg');background-attachment:fixed;background-size:cover;">
    <div class="container p-5">
        <h1 style="font-family:Arial, Helvetica, sans-serif">
            Welcome {{ucfirst($data->first_name)}} {{ucfirst($data->last_name)}}
        </h1>
        <p class="lead"> Get paid assisiting patients through online communication. We improve based on your dedication
            towards patients.
        </p>
    </div>
</div>

<div class="py-5 grey lighten-4" id="user_manual">
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
                    <img src="{{asset('img/step1.png')}}" class="img-fluid" alt="">
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