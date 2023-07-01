

<?php $__env->startSection('title_page'); ?>

home page

<?php $__env->stopSection(); ?>

<?php $__env->startSection('mycss'); ?>
<style>
    .main-panel {
        background-color: #1c2331;
    }

    p {
        color: white !important;
    }

    .icon-holder {
        width: 50px;
        height: 50px;
        background-color: #667490;
        border-radius: 50%;
        margin: 0px auto !important;
        padding-top: 13px;
        padding-left: 13px;
    }

    h2 {
        color: white !important;
    }

    .form-control {
        border: none;
        border-bottom: 1px solid #ced4da;
        font-weight: ;
    }
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body_content'); ?>
<!-- ADGRESSES-SECTION========================================ADGRESSES-SECTION==================================ADGRESSES-SECTION -->
<div class="addresses-section" style="padding-top: 5%;">
    <div class="container px-5">
        <div class="row  gx-4">
            <div class="col-lg-3 col-md-6 col-sm-12 mx-auto addresses mt-sm-4 mt-lg-0 mt-md-0">
                <div class="p-2  ">
                    <div class="icon-holder"><i class="fas fa-map-marker-alt text-center location" aria-hidden="true" style="visibility: visible;font-size: 25px;color: aliceblue;"></i></div>
                    <p class="text-center pt-3"><b>Address: </b> 250 Rt 59, Airmont NY 10901
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mx-auto addresses mt-sm-4 mt-lg-0 mt-md-0">
                <div class="p-2  ">
                    <div class="icon-holder"><i class="fas fa-phone-alt text-center " aria-hidden="true" style="visibility: visible;font-size: 25px;color: aliceblue;"></i></div>
                    <p class="text-center pt-3"><b>Phone: </b>+ 01 234 567 88
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mx-auto addresses mt-lg-0 mt-md-4 mt-sm-4">
                <div class="p-2  ">
                    <div class="icon-holder"><i class="fas fa-mail-bulk text-center " aria-hidden="true" style="visibility: visible;font-size: 25px;color: aliceblue;"></i></div>
                    <p class="text-center pt-3"><b>Email: </b>info@fanofan.com
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mx-auto addresses mt-lg-0 mt-md-4 mt-sm-4">
                <div class="p-2  ">
                    <div class="icon-holder"><i class="fas fa-globe-africa text-center location" aria-hidden="true" style="visibility: visible;font-size: 25px;color: aliceblue;"></i></div>
                    <p class="text-center pt-3"><b>Website: </b>fanofan.com
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ADGRESSES-SECTION========================================ADGRESSES-SECTION==================================ADGRESSES-SECTION -->



<!-- FEEDBACK-FORM==============================================FEEDBACK-FORM======================================FEEDBACK-FORM -->
<div class="feedback-form">
    <div class="container px-5">
        <div class="row gx-3">

            <section class="col-lg-7 col-md-10 col-sm-12  col-sm mx-auto">
                <div class="py-4 px-lg-5 px-md-4 px-sm-4 form-section" style="box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 0px 8px;">

                    <h2 class="mt-3 mb-2 text-capitalize form-header">Reach Out to Us </h2>

                    <form action="https://formspree.io/f/xwkarnaj" method="POST">

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="md-form active-purple-2 mb-3">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="text" placeholder="Name" aria-label="Search" id="name" name="Name" autocomplete="off" required="">
                                </div>

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="md-form active-purple-2 mb-3">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" placeholder="Email" aria-label="Search" id="email" name="Email" autocomplete="off" required="">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="md-form active-purple-2 mb-3">
                                    <label for="subject">Subject</label>
                                    <input class="form-control" type="text" placeholder="Subject" id="subject" aria-label="Search" name="Subject" autocomplete="off" required="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="md-form amber-textarea active-amber-textarea">
                                    <textarea id="form19" class="md-textarea form-control" placeholder="Message" name="Message" rows="4" required=""></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-button">
                            <button type="submit" class="rounded " style="margin-top: 8%;padding: 2% 3%; ">Send Message</button>
                        </div>

                    </form>

                </div>
            </section>

            <aside class="col-lg-5 col-md-7 mt-lg-0 mt-md-5 mt-sm-5 col-sm-10 mx-auto">
                <div class="form-image "></div>
            </aside>

        </div>
    </div>
</div>
<!-- FEEDBACK-FORM==============================================FEEDBACK-FORM======================================FEEDBACK-FORM -->

<!-- CONTACT-MAP=================================================CONTACT-MAP========================================CONTACT-MAP -->
<div class="contact-map ">
    <div class="container  p-0">

        <div class="map-responsive ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3005.9732754446936!2d-74.1091168852129!3d41.11327472090708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2e74411b088e9%3A0x97ae7084bc951ba2!2s250%20NY-59%2C%20Airmont%2C%20NY%2010901%2C%20USA!5e0!3m2!1sen!2sng!4v1629084143188!5m2!1sen!2sng" style="border:0;width:50%;" allowfullscreen="true" loading="lazy"></iframe>
        </div>
        <!-- CONTACT-MAP=================================================CONTACT-MAP========================================CONTACT-MAP -->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('myscript'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\votan\Desktop\x\resources\views\contact.blade.php ENDPATH**/ ?>