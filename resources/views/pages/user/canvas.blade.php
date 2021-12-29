<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- WEBSITE ICON -->
    <link rel="icon" type="image/png" href="{{ asset('images/icons/TempDonjack.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('media/icons/TempDonjack.png') }}" sizes="16x16">

    <link rel="stylesheet" href="{{ asset('css/canvas.css') }}">

    <title>CANVAS</title>
</head>
<body id="gradient">
    <section class="section slider">
        <div class="section__entry section__entry--center"></div>
    
        <input type="radio" name="slider" id="slide-1" class="slider__radio">
        <input type="radio" name="slider" id="slide-2" class="slider__radio">
        <input type="radio" name="slider" id="slide-3" class="slider__radio" checked>
        <input type="radio" name="slider" id="slide-4" class="slider__radio">
        <input type="radio" name="slider" id="slide-5" class="slider__radio">
    
        <div class="slider__holder">
    
            <label for="slide-1" class="slider__item slider__item--1 card">
                <div class="slider__item-content">
                    <p class="heading-3 heading-3--light">Development</p>
                    <p class="heading-3">SCSS Only slider</p>
                    <p class="slider__item-text serif">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Ab sed nemo eaque ullam ipsam corrupti facilis officiis nobis, iure esse!</p>
                </div>
            </label> <!-- Slider__item -->
    
            <label for="slide-2" class="slider__item slider__item--2 card">
                <div class="slider__item-content">
                    <p class="heading-3 heading-3--light">Development</p>
                    <p class="heading-3">SCSS Only slider</p>
                    <p class="slider__item-text serif">This tutorial will teach you how to create
                    a SCSS only responsive slider. Feel free to read the whole tutorial or
                    just download and try it by yourself.</p>
                </div>
            </label> <!-- Slider__item -->
    
            <label for="slide-3" class="slider__item slider__item--3 card">
                <div class="slider__item-content">
                    <p class="heading-3 heading-3--light">Development</p>
                    <p class="heading-3">SCSS Only slider</p>
                    <p class="slider__item-text serif">This tutorial will teach you how to create
                    a SCSS only responsive slider. Feel free to read the whole tutorial or
                    just download and try it by yourself.</p>
                </div>
            </label> <!-- Slider__item -->
    
            <label for="slide-4" class="slider__item slider__item--4 card">
                <div class="slider__item-content">
                    <p class="heading-3 heading-3--light">Development</p>
                    <p class="heading-3">SCSS Only slider</p>
                    <p class="slider__item-text serif">This tutorial will teach you how to create
                    a SCSS only responsive slider.Feel free to read the whole tutorial or
                    just download and try it by yourself.</p>
                </div>
            </label> <!-- Slider__item -->
    
            <label for="slide-5" class="slider__item slider__item--5 card">
                <div class="slider__item-content">
                    <p class="heading-3 heading-3--light">Development</p>
                    <p class="heading-3">SCSS Only slider</p>
                    <p class="slider__item-text serif">This tutorial will teach you how to create
                    a SCSS only responsive slider. Feel free to read the whole tutorial or
                    just download and try it by yourself.</p>
                </div>
            </label> <!-- Slider__item -->
    
        </div>
          
      </section> <!-- Section Slider -->
</body>
</html>