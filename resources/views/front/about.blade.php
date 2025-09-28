@extends('front.layouts.app')


@section('content')
<main>
    <section
      class="page-top d-flex justify-content-center align-items-center flex-column text-center"
    >
      <div class="page-top__overlay"></div>
      <div class="position-relative">
        <div class="page-top__title mb-3">
          <h2>من نحن</h2>
        </div>
        <div class="page-top__breadcrumb">
          <a class="text-gray" href="index.html">الرئيسية</a> /
          <span class="text-gray">اكتشف "أثر" – رحلتك لعالم من المعرفة تبدأ من هنا</span>
        </div>
      </div>
    </section>

    <section class="section-container d-flex align-items-center py-4">
      <div class="about__img text-center w-50">
        <img class="w-100" src="{{ asset('front-assets/images/header2.jpg') }}" alt="" />
      </div>
      <div class="w-50">
        <h4 class="fw-bolder mb-4">أثر</h4> 
        <p class="m-0">
        هو أكثر من مجرد متجر إلكتروني لبيع الكتب – إنه مساحة تهدف إلى إحياء الشغف بالقراءة،
        </p>
        <p>ونشر المعرفة، وإحداث أثر حقيقي في حياة القرّاء. </p>
        <p>نحن في أثر نؤمن أن كل كتاب يحمل رسالة، وكل قارئ يستحق أن يجد ما يلهمه. لذلك، جمعنا في مكتبتنا الإلكترونية مجموعة مختارة من الكتب في مختلف المجالات: الأدب، التنمية الذاتية، التاريخ، العلوم، الروايات العالمية والعربية، وكتب الأطفال، لتناسب جميع الأذواق والأعمار.

        </p>
      </div>
    </section>

    <section class="text-white bg-black">
      <div class="section-container py-5">
        <h4 class="fw-bolder mb-4">رسالتنا</h4>
        <p class="m-0">
          نشر ثقافة القراءة وتسهيل الوصول إلى الكتب بأسعار مناسبة وبخدمة موثوقة وسريعة
        </p>
        <h4 class="fw-bolder mb-4">رؤيتنا</h4>
        <p class="m-0">
         ان نكون الوجهة الأولى لعشاق الكتب في العالم العربي، وأن نساهم في بناء مجتمع قارئ ومثقف 
        </p>
      </div>
    </section>

    <section class="section-container d-flex align-items-center py-5">
      <div class="w-50">
        <h4 class="fw-bolder mb-4">لماذا "أثر"؟</h4>
        <p class="m-0">
          لأننا نؤمن أن الكتاب يترك أثرًا لا يُمحى في حياة من يقرأه، ونحن هنا لنكون الجسر بينك وبين ذلك الأثر.
        </p>
        {{-- <p>
          ونسعى جاهدين لتحقيق رؤيتنا وهدفنا من خلال تقديم مجموعة واسعة من
          الأحذية ذات الجودة العالية والأسعار المعقولة، وتوفير خدمة عملاء
          ممتازة.
        </p> --}}
      </div>
      <div class="about__img text-end w-50">
        <img class="w-100" src="assets/images/header2.jpg" alt="" />
      </div>
    </section>

    <section class="section-container py-5">
      <h4 class="text-center fw-bolder mb-4">
        مميزات الشراء من أثر
      </h4>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="features__item d-flex align-items-center gap-2">
            <div class="features__img">
              <img class="w-100" src="assets/images/feature-1.png" alt="" />
            </div>
            <div>
              <h6 class="features__item-title m-0">شحن سريع</h6>
              <p class="features__item-text m-0">
                سعر شحن موحد لجميع المحافظات ويصلك في أقل من 72 ساعة
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="features__item d-flex align-items-center gap-2">
            <div class="features__img">
              <img class="w-100" src="assets/images/feature-2.png" alt="" />
            </div>
            <div>
              <h6 class="features__item-title m-0">ضمان الجودة</h6>
              <p class="features__item-text m-0">
                خامات عالية الجودة ومرونه فى طلبات الاستبدال والاسترجاع
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="features__item d-flex align-items-center gap-2">
            <div class="features__img">
              <img class="w-100" src="assets/images/feature-3.png" alt="" />
            </div>
            <div>
              <h6 class="features__item-title m-0">دعم فني</h6>
              <p class="features__item-text m-0">
                دعم فني على مدار اليوم للإجابة على اي استفسار لديك
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="features__item d-flex align-items-center gap-2">
            <div class="features__img">
              <img class="w-100" src="assets/images/feature-4.png" alt="" />
            </div>
            <div>
              <h6 class="features__item-title m-0">استبدال سهل</h6>
              <p class="features__item-text m-0">
                يمكنك استبدال واسترجاع المنتج في حالة عدم مطابقة المواصفات.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  @endsection

  {{-- <style>
  .page-top {
    position: relative;
    height: 300px;
    background-image: url('{{ asset('front-assets/images/header2.jpg') }}');
    background-size: cover;
    background-position: center;
    color: #fff;
  }

  .page-top__overlay {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background: rgba(0, 0, 0, 0.6);
    z-index: 1;
  }

  .page-top .position-relative {
    z-index: 2;
  }

  .about__img img {
    border-radius: 15px;
    transition: transform 0.3s ease;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  }

  .about__img img:hover {
    transform: scale(1.03);
  }

  .section-container {
    padding-left: 4%;
    padding-right: 4%;
  }

  .bg-black {
    background: linear-gradient(to right, #222, #111);
    color: #f5f5f5;
  }

  .features__item {
    background-color: #fff;
    border-radius: 10px;
    padding: 15px;
    transition: 0.3s;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  }

  .features__item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
  }

  @media (max-width: 768px) {
    .d-flex.align-items-center {
      flex-direction: column;
      text-align: center;
    }

    .w-50 {
      width: 100% !important;
      margin-bottom: 20px;
    }

    .about__img.text-end {
      text-align: center !important;
    }
  }
</style>
 --}}
