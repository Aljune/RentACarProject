<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>freeCodecamp | Survey Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .container {
        margin: 0 15px;
    }

    .border-red {
        border: 1px solid red;
    }

    .form-box {
        width: 50%;
        background-color: #1a244a;
        padding: 30px;
    }

    .flex-justify-center {
        display: flex;
        justify-content: center;
    }

    .flex-align-item-center {
        display: flex;
        align-items: center;
    }

    .group-form-column {
        display: flex;
        flex-direction: column;
        margin-top: 10px;
    }

    .group-form-column input,
    .group-form-column select {
        padding: 7px 2px !important;
    }

    .group-form-column textarea::placeholder {
        font-size: 20px;
    }


    .btn-submit {
        padding: 9px 0;
        border-radius: 0px;
        background-color: #4caf50;
        color: white;
        font-size: 18px;
        border: 1px solid wheat;
    }

    .text-white {
        color: white;
    }

    .line-h-2 {
        line-height: 2;
    }

    .mx-5 {
        margin: 0 5px;
    }

    .fw-normal {
        font-weight: normal;
    }
</style>

<body>
    <main>
        <div class="container flex-justify-center">
            <div class="form-box ">
                <form action="">
                    <div class="group-form-column">
                        <label class="text-white line-h-2" for="">Name</label>
                        <input type="text" name="name" placeholder="Enter your name">
                    </div>

                    <div class="group-form-column">
                        <label class="text-white line-h-2" for=""> Email</label>
                        <input type="email" name="email" placeholder="Enter your email">
                    </div>

                    <div class="group-form-column">
                        <label class="text-white line-h-2" for="">Age (optional)</label>
                        <input type="number" name="age" placeholder="Enter your age">
                    </div>

                    <div class="group-form-column">
                        <label class="text-white line-h-2" for="">Which option best describes your role?</label>
                        <select name="role" id="role" aria-placeholder="dsad">
                            <option>Select current role</option>
                            <option value="admin">Admin</option>
                            <option value="student">Student</option>
                        </select>
                    </div>
                    <div class="group-form-column">
                        <h1 class="text-white fw-normal">Would you recommend freeCodecamp to a friend?</h1>
                        <div class="flex-align-item-center">
                            <input class="text-white line-h-2" type="radio" id="definitely" name="recommend" value="Definitely">
                            <label class="text-white line-h-2 mx-5" for="definitely">Definitely</label><br>
                        </div>
                        <div class="flex-align-item-center">
                            <input class="text-white line-h-2" type="radio" id="maybe" name="recommend" value="Maybe">
                            <label class="text-white line-h-2 mx-5" for="maybe">Maybe</label><br>
                        </div>
                        <div class="flex-align-item-center">
                            <input class="text-white line-h-2" type="radio" id="not-sure" name="recommend" value="Not sure">
                            <label class="text-white line-h-2 mx-5" for="not-sure">Not sure</label>
                        </div>
                    </div>
                    <div class="group-form-column">
                        <label class="text-white line-h-2" for="">What is your favorite featureCodeCamp?</label>
                        <select name="favorite-feture-code-camp" id="favorite-feture-code-camp">
                            <option>Select on option</option>
                            <option value="admin">HTML</option>
                            <option value="student">PHP</option>
                        </select>
                    </div>

                    <div class="group-form-column">
                        <h1 class="text-white fw-normal">What would you like to see improved? <br /> (Check all that apply)</h1>
                        <div class="flex-align-item-center">
                            <input class="text-white line-h-2" type="checkbox" id="front-end-projects" name="front-end-projects" value="Front-end Projects">
                            <label class="text-white line-h-2 mx-5" for="front-end-projects">Front-end Projects</label><br>
                        </div>
                        <div class="flex-align-item-center">
                            <input class="text-white line-h-2" type="checkbox" id="back-end-projects" name="back-end-projects" value="Back-end Projects">
                            <label class="text-white line-h-2 mx-5" for="back-end-projects">Back-end Projects</label><br>
                        </div>
                        <div class="flex-align-item-center">
                            <input class="text-white line-h-2" type="checkbox" id="data-visualization" name="data-visualization" value="Data Visualization">
                            <label class="text-white line-h-2 mx-5" for="data-visualization">Data Visualization</label>
                        </div>
                        <div class="flex-align-item-center">
                            <input class="text-white line-h-2" type="checkbox" id="challenges" name="challenges" value="Challenges">
                            <label class="text-white line-h-2 mx-5" for="challenges">Challenges</label>
                        </div>
                        <div class="flex-align-item-center">
                            <input class="text-white line-h-2" type="checkbox" id="open-source-community" name="open-source-community" value="Open Source Community">
                            <label class="text-white line-h-2 mx-5" for="open-source-community">Open Source Community</label>
                        </div>
                        <div class="flex-align-item-center">
                            <input class="text-white line-h-2" type="checkbox" id="gitter-help-rooms" name="gitter-help-rooms" value="Gitter help rooms">
                            <label class="text-white line-h-2 mx-5" for="gitter-help-rooms">Gitter help rooms</label>
                        </div>
                        <div class="flex-align-item-center">
                            <input class="text-white line-h-2" type="checkbox" id="video" name="video" value="Video">
                            <label class="text-white line-h-2 mx-5" for="video">Video</label>
                        </div>
                        <div class="flex-align-item-center">
                            <input class="text-white line-h-2" type="checkbox" id="city-meetups" name="city-meetups" value="City Meetups">
                            <label class="text-white line-h-2 mx-5" for="city-meetups">City Meetups</label>
                        </div>
                        <div class="flex-align-item-center">
                            <input class="text-white line-h-2" type="checkbox" id="wiki" name="wiki" value="Wiki">
                            <label class="text-white line-h-2 mx-5" for="wiki">Wiki</label>
                        </div>
                        <div class="flex-align-item-center">
                            <input class="text-white line-h-2" type="checkbox" id="forum" name="forum" value="Forum">
                            <label class="text-white line-h-2 mx-5" for="forum">Forum</label>
                        </div>
                        <div class="flex-align-item-center">
                            <input class="text-white line-h-2" type="checkbox" id="additional-courses" name="additional-courses" value="Additional Courses<">
                            <label class="text-white line-h-2 mx-5" for="additional-courses">Additional Courses</label>
                        </div>
                    </div>

                    <div class="group-form-column">
                        <h1 class="text-white fw-normal">Any comments or suggestions?</h1>
                        <textarea name="message" id="" cols="30" rows="8" placeholder="Enter your comment here..."></textarea>
                    </div>

                    <div class="group-form-column" style="margin-top: 33px;">
                        <button type="button" class="btn-submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </main>
</body>

</html>