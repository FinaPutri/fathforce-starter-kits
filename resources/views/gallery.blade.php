@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-sm-0 main">
            <div class="album-title">Photo Gallery</div>

            
            <div class="album-description">Cras vitae augue varius, commodo lectus eget, tempor mi. Aliquam a
                malesuada nisi. Fusce ac leo sed mauris finibus tempor. Quisque vitae auctor enim. Duis
                imperdiet nulla eu malesuada convallis. Aenean consequat nec dui sed mattis.</div>

            <div class="album-wrapper">
                <!--Start album wrapper -->
                
                <div class="thumbnail-wrap" style="width:311px; height:311px;">
                    <div class="thumbnail-frame" style="width:311px;">
                        <a href="#"><img src="../../landing/assets/images/gallery/2.jpg" alt="alex-siale-95113-unsplash.jpg" width="311" height="311"></a>
                        <p class="thumbnail-caption">Green mountains</p>
                    </div>
                </div>
                

                <div class="thumbnail-wrap" style="width:311px; height:311px;">
                    <div class="thumbnail-frame" style="width:311px;">
                        <a href="#"><img src="../../landing/assets/images/gallery/4.jpg" alt="johannes-ludwig-348591-unsplash.jpg" width="311" height="311"></a>
                        <p class="thumbnail-caption">Lovely lake</p>
                    </div>
                </div>

                <div class="thumbnail-wrap" style="width:311px; height:311px;">
                    <div class="thumbnail-frame" style="width:311px;">
                        <a href="#"><img src="../../landing/assets/images/gallery/6.jpg" alt="johny-goerend-402630-unsplash.jpg" width="311" height="311"></a>
                        <p class="thumbnail-caption">Beautiful sunset</p>
                    </div>
                </div>

                <div class="thumbnail-wrap" style="width:311px; height:311px;">
                    <div class="thumbnail-frame" style="width:311px;">
                        <a href="#"><img src="../../landing/assets/images/gallery/8.jpg" alt="luca-bravo-134059-unsplash.jpg" width="311" height="311"></a>
                        <p class="thumbnail-caption">Foggy lake</p>
                    </div>
                </div>

                <div class="thumbnail-wrap" style="width:311px; height:311px;">
                    <div class="thumbnail-frame" style="width:311px;">
                        <a href="#"><img src="../../landing/assets/images/gallery/10.jpg" alt="matthias-mullie-208395-unsplash.jpg" width="311" height="311"></a>
                        <p class="thumbnail-caption">Amazing view</p>
                    </div>
                </div>

                <div class="thumbnail-wrap" style="width:311px; height:311px;">
                    <div class="thumbnail-frame" style="width:311px;">
                        <a href="#"><img src="../../landing/assets/images/gallery/12.jpg" alt="paul-gilmore-94190-unsplash.jpg" width="311" height="311"></a>
                        <p class="thumbnail-caption">Blue skies and clouds</p>
                    </div>
                </div>

            </div>
            <!--End album wrapper -->

        </div>

        <div class="col-sm-4 sidebar">
            <h4></h4>


        </div>
    </div>
</div>
@endsection