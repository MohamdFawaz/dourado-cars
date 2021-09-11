<head>
    <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
</head>
<a-scene>
    <a-assets>
        <img id="panorama" src="{{asset('images/360 picture 1.jpg')}}" crossorigin />
    </a-assets>
    <a-sky src="#panorama" rotation="0 -90 0"></a-sky>
</a-scene>
