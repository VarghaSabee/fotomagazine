<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ФОТО САЛОН-МАГАЗИН</title>
    <link rel="icon" href="{{asset('images/camera.png')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/scrolling-nav.css')}}" rel="stylesheet">
    <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<style>

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    img {
        display: block;
    }

    .gallery {
        position: relative;
        z-index: 2;
        padding: 10px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-flow: row wrap;
        flex-flow: row wrap;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out;
    }
    .gallery.pop {
        -webkit-filter: blur(10px);
        filter: blur(10px);
    }
    .gallery figure {
        -ms-flex-preferred-size: 33.333%;
        flex-basis: 33.333%;
        padding: 10px;
        overflow: hidden;
        border-radius: 10px;
        cursor: pointer;
    }
    .gallery figure img {
        width: 100%;
        border-radius: 10px;
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out;
    }
    .gallery figure figcaption {
        display: none;
    }

    .popup {
        position: fixed;
        z-index: 2;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.75);
        opacity: 0;
        -webkit-transition: opacity .5s ease-in-out .2s;
        transition: opacity .5s ease-in-out .2s;
    }
    .popup.pop {
        opacity: 1;
        -webkit-transition: opacity .2s ease-in-out 0s;
        transition: opacity .2s ease-in-out 0s;
    }
    .popup.pop figure {
        margin-top: 0;
        opacity: 1;
    }
    .popup figure {
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        -webkit-transform-origin: 0 0;
        transform-origin: 0 0;
        margin-top: 30px;
        opacity: 0;
        -webkit-animation: poppy 500ms linear both;
        animation: poppy 500ms linear both;
    }
    .popup figure img {
        position: relative;
        z-index: 2;
        border-radius: 15px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.2), 0 6px 30px rgba(0, 0, 0, 0.4);
    }
    .popup figure figcaption {
        position: absolute;
        bottom: 50px;
        background: -webkit-linear-gradient(top, transparent, rgba(0, 0, 0, 0.78));
        background: linear-gradient(180deg, transparent, rgba(0, 0, 0, 0.78));
        z-index: 2;
        width: 100%;
        border-radius: 0 0 15px 15px;
        padding: 100px 20px 20px 20px;
        color: #fff;
        font-family: 'Open Sans', sans-serif;
        font-size: 32px;
    }
    .popup figure figcaption small {
        font-size: 11px;
        display: block;
        text-transform: uppercase;
        margin-top: 12px;
        text-indent: 3px;
        opacity: .7;
        letter-spacing: 1px;
    }
    .popup figure .shadow {
        position: relative;
        z-index: 1;
        top: -15px;
        margin: 0 auto;
        background-position: center bottom;
        background-repeat: no-repeat;
        width: 98%;
        height: 50px;
        opacity: .6;
        -webkit-filter: blur(15px) contrast(2);
        filter: blur(15px) contrast(2);
    }
    .popup .close {
        position: absolute;
        z-index: 3;
        top: 10px;
        right: 10px;
        width: 25px;
        height: 25px;
        cursor: pointer;
        background: url(#close);
        border-radius: 25px;
        background: rgba(0, 0, 0, 0.1);
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
    }
    .popup .close svg {
        width: 100%;
        height: 100%;
    }

    @-webkit-keyframes poppy {
        0% {
            -webkit-transform: matrix3d(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
            transform: matrix3d(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
        }
        3.4% {
            -webkit-transform: matrix3d(0.316, 0, 0, 0, 0, 0.407, 0, 0, 0, 0, 1, 0, -94.672, -91.573, 0, 1);
            transform: matrix3d(0.316, 0, 0, 0, 0, 0.407, 0, 0, 0, 0, 1, 0, -94.672, -91.573, 0, 1);
        }
        4.3% {
            -webkit-transform: matrix3d(0.408, 0, 0, 0, 0, 0.54, 0, 0, 0, 0, 1, 0, -122.527, -121.509, 0, 1);
            transform: matrix3d(0.408, 0, 0, 0, 0, 0.54, 0, 0, 0, 0, 1, 0, -122.527, -121.509, 0, 1);
        }
        4.7% {
            -webkit-transform: matrix3d(0.45, 0, 0, 0, 0, 0.599, 0, 0, 0, 0, 1, 0, -134.908, -134.843, 0, 1);
            transform: matrix3d(0.45, 0, 0, 0, 0, 0.599, 0, 0, 0, 0, 1, 0, -134.908, -134.843, 0, 1);
        }
        6.81% {
            -webkit-transform: matrix3d(0.659, 0, 0, 0, 0, 0.893, 0, 0, 0, 0, 1, 0, -197.77, -200.879, 0, 1);
            transform: matrix3d(0.659, 0, 0, 0, 0, 0.893, 0, 0, 0, 0, 1, 0, -197.77, -200.879, 0, 1);
        }
        8.61% {
            -webkit-transform: matrix3d(0.82, 0, 0, 0, 0, 1.097, 0, 0, 0, 0, 1, 0, -245.972, -246.757, 0, 1);
            transform: matrix3d(0.82, 0, 0, 0, 0, 1.097, 0, 0, 0, 0, 1, 0, -245.972, -246.757, 0, 1);
        }
        9.41% {
            -webkit-transform: matrix3d(0.883, 0, 0, 0, 0, 1.168, 0, 0, 0, 0, 1, 0, -265.038, -262.804, 0, 1);
            transform: matrix3d(0.883, 0, 0, 0, 0, 1.168, 0, 0, 0, 0, 1, 0, -265.038, -262.804, 0, 1);
        }
        10.21% {
            -webkit-transform: matrix3d(0.942, 0, 0, 0, 0, 1.226, 0, 0, 0, 0, 1, 0, -282.462, -275.93, 0, 1);
            transform: matrix3d(0.942, 0, 0, 0, 0, 1.226, 0, 0, 0, 0, 1, 0, -282.462, -275.93, 0, 1);
        }
        12.91% {
            -webkit-transform: matrix3d(1.094, 0, 0, 0, 0, 1.328, 0, 0, 0, 0, 1, 0, -328.332, -298.813, 0, 1);
            transform: matrix3d(1.094, 0, 0, 0, 0, 1.328, 0, 0, 0, 0, 1, 0, -328.332, -298.813, 0, 1);
        }
        13.61% {
            -webkit-transform: matrix3d(1.123, 0, 0, 0, 0, 1.332, 0, 0, 0, 0, 1, 0, -336.934, -299.783, 0, 1);
            transform: matrix3d(1.123, 0, 0, 0, 0, 1.332, 0, 0, 0, 0, 1, 0, -336.934, -299.783, 0, 1);
        }
        14.11% {
            -webkit-transform: matrix3d(1.141, 0, 0, 0, 0, 1.331, 0, 0, 0, 0, 1, 0, -342.273, -299.395, 0, 1);
            transform: matrix3d(1.141, 0, 0, 0, 0, 1.331, 0, 0, 0, 0, 1, 0, -342.273, -299.395, 0, 1);
        }
        17.22% {
            -webkit-transform: matrix3d(1.205, 0, 0, 0, 0, 1.252, 0, 0, 0, 0, 1, 0, -361.606, -281.592, 0, 1);
            transform: matrix3d(1.205, 0, 0, 0, 0, 1.252, 0, 0, 0, 0, 1, 0, -361.606, -281.592, 0, 1);
        }
        17.52% {
            -webkit-transform: matrix3d(1.208, 0, 0, 0, 0, 1.239, 0, 0, 0, 0, 1, 0, -362.348, -278.88, 0, 1);
            transform: matrix3d(1.208, 0, 0, 0, 0, 1.239, 0, 0, 0, 0, 1, 0, -362.348, -278.88, 0, 1);
        }
        18.72% {
            -webkit-transform: matrix3d(1.212, 0, 0, 0, 0, 1.187, 0, 0, 0, 0, 1, 0, -363.633, -267.15, 0, 1);
            transform: matrix3d(1.212, 0, 0, 0, 0, 1.187, 0, 0, 0, 0, 1, 0, -363.633, -267.15, 0, 1);
        }
        21.32% {
            -webkit-transform: matrix3d(1.196, 0, 0, 0, 0, 1.069, 0, 0, 0, 0, 1, 0, -358.864, -240.617, 0, 1);
            transform: matrix3d(1.196, 0, 0, 0, 0, 1.069, 0, 0, 0, 0, 1, 0, -358.864, -240.617, 0, 1);
        }
        24.32% {
            -webkit-transform: matrix3d(1.151, 0, 0, 0, 0, 0.96, 0, 0, 0, 0, 1, 0, -345.164, -216.073, 0, 1);
            transform: matrix3d(1.151, 0, 0, 0, 0, 0.96, 0, 0, 0, 0, 1, 0, -345.164, -216.073, 0, 1);
        }
        25.23% {
            -webkit-transform: matrix3d(1.134, 0, 0, 0, 0, 0.938, 0, 0, 0, 0, 1, 0, -340.193, -210.948, 0, 1);
            transform: matrix3d(1.134, 0, 0, 0, 0, 0.938, 0, 0, 0, 0, 1, 0, -340.193, -210.948, 0, 1);
        }
        28.33% {
            -webkit-transform: matrix3d(1.075, 0, 0, 0, 0, 0.898, 0, 0, 0, 0, 1, 0, -322.647, -202.048, 0, 1);
            transform: matrix3d(1.075, 0, 0, 0, 0, 0.898, 0, 0, 0, 0, 1, 0, -322.647, -202.048, 0, 1);
        }
        29.03% {
            -webkit-transform: matrix3d(1.063, 0, 0, 0, 0, 0.897, 0, 0, 0, 0, 1, 0, -318.884, -201.771, 0, 1);
            transform: matrix3d(1.063, 0, 0, 0, 0, 0.897, 0, 0, 0, 0, 1, 0, -318.884, -201.771, 0, 1);
        }
        29.93% {
            -webkit-transform: matrix3d(1.048, 0, 0, 0, 0, 0.899, 0, 0, 0, 0, 1, 0, -314.277, -202.202, 0, 1);
            transform: matrix3d(1.048, 0, 0, 0, 0, 0.899, 0, 0, 0, 0, 1, 0, -314.277, -202.202, 0, 1);
        }
        35.54% {
            -webkit-transform: matrix3d(0.979, 0, 0, 0, 0, 0.962, 0, 0, 0, 0, 1, 0, -293.828, -216.499, 0, 1);
            transform: matrix3d(0.979, 0, 0, 0, 0, 0.962, 0, 0, 0, 0, 1, 0, -293.828, -216.499, 0, 1);
        }
        36.74% {
            -webkit-transform: matrix3d(0.972, 0, 0, 0, 0, 0.979, 0, 0, 0, 0, 1, 0, -291.489, -220.242, 0, 1);
            transform: matrix3d(0.972, 0, 0, 0, 0, 0.979, 0, 0, 0, 0, 1, 0, -291.489, -220.242, 0, 1);
        }
        39.44% {
            -webkit-transform: matrix3d(0.962, 0, 0, 0, 0, 1.01, 0, 0, 0, 0, 1, 0, -288.62, -227.228, 0, 1);
            transform: matrix3d(0.962, 0, 0, 0, 0, 1.01, 0, 0, 0, 0, 1, 0, -288.62, -227.228, 0, 1);
        }
        41.04% {
            -webkit-transform: matrix3d(0.961, 0, 0, 0, 0, 1.022, 0, 0, 0, 0, 1, 0, -288.247, -229.999, 0, 1);
            transform: matrix3d(0.961, 0, 0, 0, 0, 1.022, 0, 0, 0, 0, 1, 0, -288.247, -229.999, 0, 1);
        }
        44.44% {
            -webkit-transform: matrix3d(0.966, 0, 0, 0, 0, 1.032, 0, 0, 0, 0, 1, 0, -289.763, -232.215, 0, 1);
            transform: matrix3d(0.966, 0, 0, 0, 0, 1.032, 0, 0, 0, 0, 1, 0, -289.763, -232.215, 0, 1);
        }
        52.15% {
            -webkit-transform: matrix3d(0.991, 0, 0, 0, 0, 1.006, 0, 0, 0, 0, 1, 0, -297.363, -226.449, 0, 1);
            transform: matrix3d(0.991, 0, 0, 0, 0, 1.006, 0, 0, 0, 0, 1, 0, -297.363, -226.449, 0, 1);
        }
        59.86% {
            -webkit-transform: matrix3d(1.006, 0, 0, 0, 0, 0.99, 0, 0, 0, 0, 1, 0, -301.813, -222.759, 0, 1);
            transform: matrix3d(1.006, 0, 0, 0, 0, 0.99, 0, 0, 0, 0, 1, 0, -301.813, -222.759, 0, 1);
        }
        61.66% {
            -webkit-transform: matrix3d(1.007, 0, 0, 0, 0, 0.991, 0, 0, 0, 0, 1, 0, -302.102, -222.926, 0, 1);
            transform: matrix3d(1.007, 0, 0, 0, 0, 0.991, 0, 0, 0, 0, 1, 0, -302.102, -222.926, 0, 1);
        }
        63.26% {
            -webkit-transform: matrix3d(1.007, 0, 0, 0, 0, 0.992, 0, 0, 0, 0, 1, 0, -302.171, -223.276, 0, 1);
            transform: matrix3d(1.007, 0, 0, 0, 0, 0.992, 0, 0, 0, 0, 1, 0, -302.171, -223.276, 0, 1);
        }
        75.28% {
            -webkit-transform: matrix3d(1.001, 0, 0, 0, 0, 1.003, 0, 0, 0, 0, 1, 0, -300.341, -225.696, 0, 1);
            transform: matrix3d(1.001, 0, 0, 0, 0, 1.003, 0, 0, 0, 0, 1, 0, -300.341, -225.696, 0, 1);
        }
        83.98% {
            -webkit-transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.61, -225.049, 0, 1);
            transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.61, -225.049, 0, 1);
        }
        85.49% {
            -webkit-transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.599, -224.94, 0, 1);
            transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.599, -224.94, 0, 1);
        }
        90.69% {
            -webkit-transform: matrix3d(0.999, 0, 0, 0, 0, 0.999, 0, 0, 0, 0, 1, 0, -299.705, -224.784, 0, 1);
            transform: matrix3d(0.999, 0, 0, 0, 0, 0.999, 0, 0, 0, 0, 1, 0, -299.705, -224.784, 0, 1);
        }
        100% {
            -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -300, -225, 0, 1);
            transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -300, -225, 0, 1);
        }
    }

    @keyframes poppy {
        0% {
            -webkit-transform: matrix3d(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
            transform: matrix3d(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
        }
        3.4% {
            -webkit-transform: matrix3d(0.316, 0, 0, 0, 0, 0.407, 0, 0, 0, 0, 1, 0, -94.672, -91.573, 0, 1);
            transform: matrix3d(0.316, 0, 0, 0, 0, 0.407, 0, 0, 0, 0, 1, 0, -94.672, -91.573, 0, 1);
        }
        4.3% {
            -webkit-transform: matrix3d(0.408, 0, 0, 0, 0, 0.54, 0, 0, 0, 0, 1, 0, -122.527, -121.509, 0, 1);
            transform: matrix3d(0.408, 0, 0, 0, 0, 0.54, 0, 0, 0, 0, 1, 0, -122.527, -121.509, 0, 1);
        }
        4.7% {
            -webkit-transform: matrix3d(0.45, 0, 0, 0, 0, 0.599, 0, 0, 0, 0, 1, 0, -134.908, -134.843, 0, 1);
            transform: matrix3d(0.45, 0, 0, 0, 0, 0.599, 0, 0, 0, 0, 1, 0, -134.908, -134.843, 0, 1);
        }
        6.81% {
            -webkit-transform: matrix3d(0.659, 0, 0, 0, 0, 0.893, 0, 0, 0, 0, 1, 0, -197.77, -200.879, 0, 1);
            transform: matrix3d(0.659, 0, 0, 0, 0, 0.893, 0, 0, 0, 0, 1, 0, -197.77, -200.879, 0, 1);
        }
        8.61% {
            -webkit-transform: matrix3d(0.82, 0, 0, 0, 0, 1.097, 0, 0, 0, 0, 1, 0, -245.972, -246.757, 0, 1);
            transform: matrix3d(0.82, 0, 0, 0, 0, 1.097, 0, 0, 0, 0, 1, 0, -245.972, -246.757, 0, 1);
        }
        9.41% {
            -webkit-transform: matrix3d(0.883, 0, 0, 0, 0, 1.168, 0, 0, 0, 0, 1, 0, -265.038, -262.804, 0, 1);
            transform: matrix3d(0.883, 0, 0, 0, 0, 1.168, 0, 0, 0, 0, 1, 0, -265.038, -262.804, 0, 1);
        }
        10.21% {
            -webkit-transform: matrix3d(0.942, 0, 0, 0, 0, 1.226, 0, 0, 0, 0, 1, 0, -282.462, -275.93, 0, 1);
            transform: matrix3d(0.942, 0, 0, 0, 0, 1.226, 0, 0, 0, 0, 1, 0, -282.462, -275.93, 0, 1);
        }
        12.91% {
            -webkit-transform: matrix3d(1.094, 0, 0, 0, 0, 1.328, 0, 0, 0, 0, 1, 0, -328.332, -298.813, 0, 1);
            transform: matrix3d(1.094, 0, 0, 0, 0, 1.328, 0, 0, 0, 0, 1, 0, -328.332, -298.813, 0, 1);
        }
        13.61% {
            -webkit-transform: matrix3d(1.123, 0, 0, 0, 0, 1.332, 0, 0, 0, 0, 1, 0, -336.934, -299.783, 0, 1);
            transform: matrix3d(1.123, 0, 0, 0, 0, 1.332, 0, 0, 0, 0, 1, 0, -336.934, -299.783, 0, 1);
        }
        14.11% {
            -webkit-transform: matrix3d(1.141, 0, 0, 0, 0, 1.331, 0, 0, 0, 0, 1, 0, -342.273, -299.395, 0, 1);
            transform: matrix3d(1.141, 0, 0, 0, 0, 1.331, 0, 0, 0, 0, 1, 0, -342.273, -299.395, 0, 1);
        }
        17.22% {
            -webkit-transform: matrix3d(1.205, 0, 0, 0, 0, 1.252, 0, 0, 0, 0, 1, 0, -361.606, -281.592, 0, 1);
            transform: matrix3d(1.205, 0, 0, 0, 0, 1.252, 0, 0, 0, 0, 1, 0, -361.606, -281.592, 0, 1);
        }
        17.52% {
            -webkit-transform: matrix3d(1.208, 0, 0, 0, 0, 1.239, 0, 0, 0, 0, 1, 0, -362.348, -278.88, 0, 1);
            transform: matrix3d(1.208, 0, 0, 0, 0, 1.239, 0, 0, 0, 0, 1, 0, -362.348, -278.88, 0, 1);
        }
        18.72% {
            -webkit-transform: matrix3d(1.212, 0, 0, 0, 0, 1.187, 0, 0, 0, 0, 1, 0, -363.633, -267.15, 0, 1);
            transform: matrix3d(1.212, 0, 0, 0, 0, 1.187, 0, 0, 0, 0, 1, 0, -363.633, -267.15, 0, 1);
        }
        21.32% {
            -webkit-transform: matrix3d(1.196, 0, 0, 0, 0, 1.069, 0, 0, 0, 0, 1, 0, -358.864, -240.617, 0, 1);
            transform: matrix3d(1.196, 0, 0, 0, 0, 1.069, 0, 0, 0, 0, 1, 0, -358.864, -240.617, 0, 1);
        }
        24.32% {
            -webkit-transform: matrix3d(1.151, 0, 0, 0, 0, 0.96, 0, 0, 0, 0, 1, 0, -345.164, -216.073, 0, 1);
            transform: matrix3d(1.151, 0, 0, 0, 0, 0.96, 0, 0, 0, 0, 1, 0, -345.164, -216.073, 0, 1);
        }
        25.23% {
            -webkit-transform: matrix3d(1.134, 0, 0, 0, 0, 0.938, 0, 0, 0, 0, 1, 0, -340.193, -210.948, 0, 1);
            transform: matrix3d(1.134, 0, 0, 0, 0, 0.938, 0, 0, 0, 0, 1, 0, -340.193, -210.948, 0, 1);
        }
        28.33% {
            -webkit-transform: matrix3d(1.075, 0, 0, 0, 0, 0.898, 0, 0, 0, 0, 1, 0, -322.647, -202.048, 0, 1);
            transform: matrix3d(1.075, 0, 0, 0, 0, 0.898, 0, 0, 0, 0, 1, 0, -322.647, -202.048, 0, 1);
        }
        29.03% {
            -webkit-transform: matrix3d(1.063, 0, 0, 0, 0, 0.897, 0, 0, 0, 0, 1, 0, -318.884, -201.771, 0, 1);
            transform: matrix3d(1.063, 0, 0, 0, 0, 0.897, 0, 0, 0, 0, 1, 0, -318.884, -201.771, 0, 1);
        }
        29.93% {
            -webkit-transform: matrix3d(1.048, 0, 0, 0, 0, 0.899, 0, 0, 0, 0, 1, 0, -314.277, -202.202, 0, 1);
            transform: matrix3d(1.048, 0, 0, 0, 0, 0.899, 0, 0, 0, 0, 1, 0, -314.277, -202.202, 0, 1);
        }
        35.54% {
            -webkit-transform: matrix3d(0.979, 0, 0, 0, 0, 0.962, 0, 0, 0, 0, 1, 0, -293.828, -216.499, 0, 1);
            transform: matrix3d(0.979, 0, 0, 0, 0, 0.962, 0, 0, 0, 0, 1, 0, -293.828, -216.499, 0, 1);
        }
        36.74% {
            -webkit-transform: matrix3d(0.972, 0, 0, 0, 0, 0.979, 0, 0, 0, 0, 1, 0, -291.489, -220.242, 0, 1);
            transform: matrix3d(0.972, 0, 0, 0, 0, 0.979, 0, 0, 0, 0, 1, 0, -291.489, -220.242, 0, 1);
        }
        39.44% {
            -webkit-transform: matrix3d(0.962, 0, 0, 0, 0, 1.01, 0, 0, 0, 0, 1, 0, -288.62, -227.228, 0, 1);
            transform: matrix3d(0.962, 0, 0, 0, 0, 1.01, 0, 0, 0, 0, 1, 0, -288.62, -227.228, 0, 1);
        }
        41.04% {
            -webkit-transform: matrix3d(0.961, 0, 0, 0, 0, 1.022, 0, 0, 0, 0, 1, 0, -288.247, -229.999, 0, 1);
            transform: matrix3d(0.961, 0, 0, 0, 0, 1.022, 0, 0, 0, 0, 1, 0, -288.247, -229.999, 0, 1);
        }
        44.44% {
            -webkit-transform: matrix3d(0.966, 0, 0, 0, 0, 1.032, 0, 0, 0, 0, 1, 0, -289.763, -232.215, 0, 1);
            transform: matrix3d(0.966, 0, 0, 0, 0, 1.032, 0, 0, 0, 0, 1, 0, -289.763, -232.215, 0, 1);
        }
        52.15% {
            -webkit-transform: matrix3d(0.991, 0, 0, 0, 0, 1.006, 0, 0, 0, 0, 1, 0, -297.363, -226.449, 0, 1);
            transform: matrix3d(0.991, 0, 0, 0, 0, 1.006, 0, 0, 0, 0, 1, 0, -297.363, -226.449, 0, 1);
        }
        59.86% {
            -webkit-transform: matrix3d(1.006, 0, 0, 0, 0, 0.99, 0, 0, 0, 0, 1, 0, -301.813, -222.759, 0, 1);
            transform: matrix3d(1.006, 0, 0, 0, 0, 0.99, 0, 0, 0, 0, 1, 0, -301.813, -222.759, 0, 1);
        }
        61.66% {
            -webkit-transform: matrix3d(1.007, 0, 0, 0, 0, 0.991, 0, 0, 0, 0, 1, 0, -302.102, -222.926, 0, 1);
            transform: matrix3d(1.007, 0, 0, 0, 0, 0.991, 0, 0, 0, 0, 1, 0, -302.102, -222.926, 0, 1);
        }
        63.26% {
            -webkit-transform: matrix3d(1.007, 0, 0, 0, 0, 0.992, 0, 0, 0, 0, 1, 0, -302.171, -223.276, 0, 1);
            transform: matrix3d(1.007, 0, 0, 0, 0, 0.992, 0, 0, 0, 0, 1, 0, -302.171, -223.276, 0, 1);
        }
        75.28% {
            -webkit-transform: matrix3d(1.001, 0, 0, 0, 0, 1.003, 0, 0, 0, 0, 1, 0, -300.341, -225.696, 0, 1);
            transform: matrix3d(1.001, 0, 0, 0, 0, 1.003, 0, 0, 0, 0, 1, 0, -300.341, -225.696, 0, 1);
        }
        83.98% {
            -webkit-transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.61, -225.049, 0, 1);
            transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.61, -225.049, 0, 1);
        }
        85.49% {
            -webkit-transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.599, -224.94, 0, 1);
            transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.599, -224.94, 0, 1);
        }
        90.69% {
            -webkit-transform: matrix3d(0.999, 0, 0, 0, 0, 0.999, 0, 0, 0, 0, 1, 0, -299.705, -224.784, 0, 1);
            transform: matrix3d(0.999, 0, 0, 0, 0, 0.999, 0, 0, 0, 0, 1, 0, -299.705, -224.784, 0, 1);
        }
        100% {
            -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -300, -225, 0, 1);
            transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -300, -225, 0, 1);
        }
    }
    /***********************************************/
    .bg-primary{
        height: 100vh;
        background-image: url("{{asset('images/photographer.jpg')}}");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
    }
    .bg-primary h1{
        padding-top: 10%;
        font-size: 5em;
        font-weight: bolder;
        color : #dddddd;
    }
    #contact{
        background-image: url("{{asset('images/contact-us.jpg')}}");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size:100%,100vh;
    }

#scrollup:hover{
    cursor: pointer;
    -moz-transform: scaleX(1.1); /* Для Firefox */
    -ms-transform: scaleX(1.1); /* Для IE */
    -webkit-transform: scaleX(1.1); /* Для Safari, Chrome, iOS */
    -o-transform: scaleX(1.1); /* Для Opera */
    transform: scaleX(1.1);
}
    .nav-item btn-group{
        background-color: red;
    }
</style>
</head>
<body id="page-top">
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{route('index')}}">Фото салон</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#main">Головна</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#about">Про нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#gallery">Галерея</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">Контакти</a>
                </li>

                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{route('orders.create')}}">Замовити</a>
                                <a class="dropdown-item" href="{{route('orders.user')}}">Мої замовлення</a>
                                <a class="dropdown-item" href="{{route('users.edit',['id'=> Auth::user()->id])}}">Мій профіль</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
            </ul>
        </div>
    </div>
</nav>

<header id="main" class="bg-primary text-white">
    <div class="container text-center">
        <h1>«ФОТО САЛОН-МАГАЗИН»</h1>
        <a href="{{Auth::check() ? route('orders.create') : route('login')}}" class="btn btn-outline-warning waves-effect">Замовити</a>
    </div>
</header>

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto" >
                <img src="{{asset('images/about.jpg')}}" style="max-width: 350px;float: left;border: 15px solid transparent">
                <h1 style="padding: 15px">Про нас</h1>
                <p class="lead" style="text-align: justify; padding: 15px;">
                       Фотостудія - це майстерня фотографа. Все обладнання, підручні матеріали виконують тільки технічну сторону, все інше залежить від фотографа. Чи не фотоапарат робить знімок, а фотограф.
                       Ми вкладаємо душу в кожен фотознімок, не залежно від призначення, будь-то фотографія на документи, для сімейного альбому або портфоліо.
                       Для Вас важливо отримати високої якості послугу, для нас - втілити Ваші ідеї в життя.
                       Індивідуальний підхід до кожного клієнта, професійні фотографи, високий рівень якості і широкий спектр надаваних фото- і відеопослуг - ось що Вас чекає в нашому фотосалону.</p>

            </div>
        </div>
    </div>
</section>
<section id="gallery" style="margin-bottom: -80px">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto" style="margin-top: -100px">
                <h1 class="text-center">Галерея</h1>
                <div class="gallery">
                    @foreach($images as $image)
                    <figure>
                        <img src="{{asset('images/') .'/gallery/'. $image}}" alt="" />
                        <!--figcaption>Daytona Beach <small>United States</small></figcaption-->
                    </figure>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>


<section id="contact">
    <div class="container text-center" style="height:30vh; color: white;">
        <h2 style="padding: 25px;">Контакти</h2>
        <div class="row">
                <div class="col-lg-3 mx-auto">
                    <p><i class="far fa-map" style="font-size:20px;"></i>  пл. Шандора Петефі 9, Ужгород</p>
                </div>
            <div class="col-lg-3 mx-auto">
                <p><i class="fas fa-phone" style="font-size:20px;"></i>  +380969604521</p>
            </div>
            <div class="col-lg-3 mx-auto">
                <p><i class="far fa-envelope" style="font-size:20px;"></i>  foto-salon@ukr.net</p>
            </div>
        </div>
    </div>
</section>
<div>
    <iframe width="100%" height="400px" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ2eO2RLkZOUcRPCoEMAGupg0&key=AIzaSyCHK8oAPzGStm2WrHfM7Eket5ybYWGxpLM" allowfullscreen></iframe>
</div>
<!-- Footer -->
<footer class="py-5 bg-dark" style="margin-top: -20px">
    <div class="container">
         <p class="m-0 text-center text-white" style="font-size: 2em">© «ФОТО салон-магазин» {{ date('Y') }}</p><img id="scrollup" src="{{asset('images/up.png')}}" style="float: right; margin-top: -40px;">
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom JavaScript for this theme -->
<script src="{{asset('js/scrolling-nav.js')}}"></script>
<script src="{{asset('js/mdb.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>

<script>
    $(document).ready(function () {

        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#scrollup').fadeIn();
            } else {
                $('#scrollup').fadeOut();
            }
        });

        $('#scrollup').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 800);
            return false;
        });


        popup = {
            init: function(){
                $('figure').click(function(){
                    popup.open($(this));
                });

                $(document).on('click', '.popup img', function(){
                    return false;
                }).on('click', '.popup', function(){
                    popup.close();
                })
            },
            open: function($figure) {
                $('.gallery').addClass('pop');
                $popup = $('<div class="popup" />').appendTo($('body'));
                $fig = $figure.clone().appendTo($('.popup'));
                $bg = $('<div class="bg" />').appendTo($('.popup'));
                $close = $('<div class="close"><svg><use xlink:href="#close"></use></svg></div>').appendTo($fig);
                $shadow = $('<div class="shadow" />').appendTo($fig);
                src = $('img', $fig).attr('src');
                $shadow.css({backgroundImage: 'url(' + src + ')'});
                $bg.css({backgroundImage: 'url(' + src + ')'});
                setTimeout(function(){
                    $('.popup').addClass('pop');
                }, 10);
            },
            close: function(){
                $('.gallery, .popup').removeClass('pop');
                setTimeout(function(){
                    $('.popup').remove()
                }, 100);
            }
        }

        popup.init()
    });

</script>
</body>
</html>
