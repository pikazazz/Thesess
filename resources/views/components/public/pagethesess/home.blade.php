<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In & Sign Up Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@500&display=swap" rel="stylesheet">


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://kit.fontawesome.com/1788c719dd.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<style>
    * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Prompt';
    }

    a {
        text-decoration: none;
    }

    body,
    input {
        font-family: "Prompt", sans-serif;
    }

    .containers {
        position: relative;
        width: 100%;
        min-height: 100vh;
        background: #fff;
        overflow: hidden;
    }

    .fullscreen {
        margin: 0;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
    }

    .containers::before {
        content: "";
        position: absolute;
        width: 2000px;
        height: 2000px;
        border-radius: 50%;
        background: linear-gradient(-45deg, #3f7cff, #3f7cff);
        right: 48%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        z-index: 6;
        -webkit-transition: 1.8s ease-in-out;
        transition: 1.8s ease-in-out;
    }

    .containers__forms {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }

    .containers__panels {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        display: -ms-grid;
        display: grid;
        -ms-grid-columns: (1fr) [2];
        grid-template-columns: repeat(2, 1fr);
    }

    form {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        padding: 0 5rem;
        overflow: hidden;
        -ms-grid-column: 1;
        -ms-grid-column-span: 1;
        grid-column: 1 / 2;
        -ms-grid-row: 1;
        -ms-grid-row-span: 1;
        grid-row: 1 / 2;
        -webkit-transition: 0.2s 0.7s ease-in-out;
        transition: 0.2s 0.7s ease-in-out;
    }

    form.form__sign-in {
        z-index: 2;
    }

    form.form__sign-up {
        z-index: 1;
        opacity: 0;
    }

    .form {
        position: absolute;
        top: 50%;
        left: 75%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        width: 50%;
        display: -ms-grid;
        display: grid;
        -ms-grid-columns: 1fr;
        grid-template-columns: 1fr;
        z-index: 5;
        -webkit-transition: 1s 0.7s ease-in-out;
        transition: 1s 0.7s ease-in-out;
    }

    .form__title {
        font-size: 2.2rem;
        color: #444;
        margin-bottom: 10px;

    }

    .form__input-field {
        max-width: 380px;
        width: 100%;
        height: 3.437rem;
        background-color: #f0f0f0;
        margin: 10px 0;
        border-radius: 3.437rem;
        display: -ms-grid;
        display: grid;
        -ms-grid-columns: 15% 85%;
        grid-template-columns: 15% 85%;
        padding: 0 0.4rem;
    }

    .form__input-field i {
        text-align: center;
        line-height: 3.437rem;
        color: #acacac;
        font-size: 1.1rem;
    }

    .form__input-field input {
        background: none;
        outline: none;
        border: none;
        line-height: 1;
        font-weight: 600;
        font-size: 1.1rem;
        color: #333;
        border-radius: inherit;
    }

    .form__input-field input::-webkit-input-placeholder {
        color: #aaa;
        font-weight: 500;
    }

    .form__input-field input:-ms-input-placeholder {
        color: #aaa;
        font-weight: 500;
    }

    .form__input-field input::-ms-input-placeholder {
        color: #aaa;
        font-weight: 500;
    }

    .form__input-field input::placeholder {
        color: #aaa;
        font-weight: 500;
    }

    .form__submit {
        width: 9.375rem;
        height: 3.0625rem;
        border: none;
        outline: none;
        border-radius: 3.0625rem;
        cursor: pointer;
        background-color: #1f51bd;
        color: #fff;
        text-transform: uppercase;
        font-weight: 600;
        margin: 10px 0;
        -webkit-transition: 0.5s;
        transition: 0.5s;
    }

    .form__submit:hover {
        background-color: #1f51bd;
    }

    .form__social-text {
        padding: 0.7rem 0;
        font-size: 1rem;
    }

    .form__social-media {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    .form__social-icons {
        height: 2.875rem;
        width: 2.875rem;
        border: 1px solid #333;
        border-radius: 50%;
        margin: 0 0.45rem;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        color: #333;
        font-size: 1.1rem;
        -webkit-transition: 0.3s;
        transition: 0.3s;
    }

    .form__social-icons:hover {
        color: #1f51bd;
        ;
        border-color: #1f51bd;
        ;
    }

    .panel {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-align: end;
        -ms-flex-align: end;
        align-items: flex-end;
        -ms-flex-pack: distribute;
        justify-content: space-around;
        text-align: center;
        z-index: 7;
    }

    .panel__content {
        color: #fff;
        -webkit-transition: 0.9s 0.6s ease-in-out;
        transition: 0.9s 0.6s ease-in-out;
    }

    .panel__left {
        pointer-events: all;
        padding: 3rem 17% 2rem 12%;
    }

    .panel__right {
        pointer-events: none;
        padding: 3rem 12% 2rem 17%;
    }

    .panel__title {
        font-weight: 600;
        line-height: 1;
        font-size: 1.5rem;
    }

    .panel__paragraph {
        font-size: 0.95rem;
        padding: 0.7rem 0;
        max-width: 560px;
    }

    .panel__image {
        width: 120%;
        -webkit-transition: 1.1s 0.4s ease-in-out;
        transition: 1.1s 0.4s ease-in-out;
    }

    .btn {
        border: none;
        outline: none;
        border-radius: 3.0625rem;
        cursor: pointer;
        color: #fff;
        text-transform: uppercase;
        font-weight: 600;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        margin: 0;
        background: none;
        border: 2px solid #fff;
        width: 130px;
        height: 41px;
        font-size: 0.8rem;
    }

    /*Animation*/
    .panel__right .panel__content,
    .panel__right .panel__image {
        -webkit-transform: translateX(800px);
        transform: translateX(800px);
    }

    .containers.sign-up-mode .panel__right .panel__content,
    .containers.sign-up-mode .panel__right .panel__image {
        -webkit-transform: translateX(0px);
        transform: translateX(0px);
    }

    .containers.sign-up-mode::before {
        -webkit-transform: translate(100%, -50%);
        transform: translate(100%, -50%);
        right: 52%;
    }

    .containers.sign-up-mode .panel__left .panel__image,
    .containers.sign-up-mode .panel__left .panel__content {
        -webkit-transform: translateX(-800px);
        transform: translateX(-800px);
    }

    .containers.sign-up-mode .panel__left {
        pointer-events: none;
    }

    .containers.sign-up-mode .panel__right {
        pointer-events: all;
    }

    .containers.sign-up-mode .form {
        left: 25%;
    }

    .containers.sign-up-mode form.form__sign-in {
        z-index: 1;
        opacity: 0;
    }

    .containers.sign-up-mode form.form__sign-up {
        z-index: 2;
        opacity: 1;
    }

    @media (max-width: 870px) {
        .containers {
            min-height: 800px;
            height: 100vh;
        }

        .containers::before {
            width: 1500px;
            height: 1500px;
            left: 30%;
            bottom: 68%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            right: initial;
            top: initial;
            -webkit-transition: 2s ease-in-out;
            transition: 2s ease-in-out;
        }

        .form {
            width: 100%;
            left: 50%;
            top: 95%;
            -webkit-transform: translate(-50%, -100%);
            transform: translate(-50%, -100%);
            -webkit-transition: 1s 0.8s ease-in-out;
            transition: 1s 0.8s ease-in-out;
        }

        .containers__panels {
            -ms-grid-columns: 1fr;
            grid-template-columns: 1fr;
            -ms-grid-rows: 1fr 2fr 1fr;
            grid-template-rows: 1fr 2fr 1fr;
        }

        .panel {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-pack: distribute;
            justify-content: space-around;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 2.5rem 8%;
        }

        .panel__left {
            -ms-grid-row: 1;
            -ms-grid-row-span: 1;
            grid-row: 1 / 2;
        }

        .panel__right {
            -ms-grid-row: 3;
            -ms-grid-row-span: 1;
            grid-row: 3 / 4;
        }

        .panel__image {
            width: 200px;
            -webkit-transition: 0.9s 0.6s ease-in-out;
            transition: 0.9s 0.6s ease-in-out;
        }

        .panel__content {
            padding-right: 15%;
            -webkit-transition: 0.9s 0.8s ease-in-out;
            transition: 0.9s 0.8s ease-in-out;
        }

        .panel__title {
            font-size: 1.2rem;
        }

        .panel__paragraph {
            font-size: 0.7rem;
            padding: 0.5rem 0;
        }

        .panel__right .panel__content,
        .panel__right .panel__image {
            -webkit-transform: translateY(300px);
            transform: translateY(300px);
        }

        .btn {
            width: 6.875rem;
            height: 2.187rem;
            font-size: 0.7rem;
        }

        .containers.sign-up-mode::before {
            -webkit-transform: translate(-50%, 100%);
            transform: translate(-50%, 100%);
            bottom: 32%;
            right: initial;
        }

        .containers.containers.sign-up-mode .panel__left .panel__image,
        .containers.containers.sign-up-mode .panel__left .panel__content {
            -webkit-transform: translateY(-300px);
            transform: translateY(-300px);
        }

        .containers.sign-up-mode .form {
            top: 5%;
            -webkit-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
            left: 50%;
        }
    }

    @media (max-width: 570px) {
        form {
            padding: 0 1.5rem;
        }

        .panel__image {
            display: none;
        }

        .panel__content {
            padding: 0.5rem 1rem;
        }

        .containers::before {
            bottom: 72%;
            left: 50%;
        }

        .containers.sign-up-mode::before {
            bottom: 28%;
            left: 50%;
        }
    }

</style>

<body>
    <div class="containers">

        <div class="containers__panels">
            <div class="panel panel__left">
                <div class="panel__content">
                    <h3 class="panel__title">รหัสผ่านได้จากไหน ?</h3>

                    <button class="btn btn-transparent" id="sign-up-btn">
                        TEST
                    </button>
                </div>
                <img class="panel__image" src="{{ asset('public/img/Loginpage2.png') }}" alt="" />
            </div>
            <div class="panel panel__right">
                <div class="panel__content">
                    <h3 class="panel__title">รหัสผ่านได้จากไหน ?</h3>
                    <p class="panel__paragraph">
                        TEST
                    </p>
                    <button class="btn btn-transparent" id="sign-in-btn">
                        TEST
                    </button>
                </div>
                <img class="panel__image" src="{{ asset('public/img/Loginpage2.png') }}" alt="" />

            </div>
        </div>
    </div>

    <!-- Modal -->

</body><!-- Modal -->
<div class="modal fade " id="modal-xl" tabindex="-1" style="display: block;" aria-labelledby="exampleModalLabel"
    aria-hidden="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">รายละเอียดโครงงาน</h5>
            </div>
            <div class="modal-body">
                {{$data->group_name}}
            </div>
        </div>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        $('#modal-xl').modal("show");
    });
    $('#modal-xl').on('hidden.bs.modal', function(event) {
        $('#modal-xl').modal("show");
    })
</script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
