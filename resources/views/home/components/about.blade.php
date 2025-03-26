@php $settingDataFromLayout=\App\Models\Settings::getSettingValue(); @endphp
<div id="about" class="about section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-left-image  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                            <img src="{{asset('assets')}}/images/about_img.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center  wow fadeInRight" data-wow-duration="1s"
                         data-wow-delay="0.5s">
                        <div class="about-right-content">
                            <div class="section-heading">
                                <h6>Hakkımızda</h6>
                                <h4><em>{{$settingDataFromLayout->company_name}}</em> Kimdir?</h4>
                                <div class="line-dec"></div>
                            </div>
                            <p>
                                Smart-EMK, endüstriyel otomasyon, lojistik çözümleri ve depo yönetimi alanlarında
                                uzmanlaşmış bir teknoloji firmasıdır. Konveyör sistemleri, sorter çözümleri ve otomatik
                                yükleme/boşaltma sistemleri ile işletmelerin üretim ve lojistik süreçlerini
                                hızlandırmasına yardımcı oluyoruz.
                                Müşteri odaklı yaklaşımımız ve Endüstri 4.0 uyumlu akıllı çözümlerimiz ile işletmelere
                                maksimum verimlilik ve düşük maliyet avantajı sağlıyoruz.
                            </p>

                            <div style="float: none;" class="border-first-button"><a href="{{route('home_aboutus')}}">Daha Fazla</a></div>

                            <!--
                            <div class="row">
                                <div class="col-lg-4 col-sm-4">
                                    <div class="skill-item first-skill-item wow fadeIn" data-wow-duration="1s"
                                         data-wow-delay="0s">
                                        <div class="progress" data-percentage="90">
                        <span class="progress-left">
                          <span class="progress-bar"></span>
                        </span>
                                            <span class="progress-right">
                          <span class="progress-bar"></span>
                        </span>
                                            <div class="progress-value">
                                                <div>
                                                    90%<br>
                                                    <span>Otomasyon</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4">
                                    <div class="skill-item second-skill-item wow fadeIn" data-wow-duration="1s"
                                         data-wow-delay="0s">
                                        <div class="progress" data-percentage="80">
                        <span class="progress-left">
                          <span class="progress-bar"></span>
                        </span>
                                            <span class="progress-right">
                          <span class="progress-bar"></span>
                        </span>
                                            <div class="progress-value">
                                                <div>
                                                    80%<br>
                                                    <span>Lojistik</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4">
                                    <div class="skill-item third-skill-item wow fadeIn" data-wow-duration="1s"
                                         data-wow-delay="0s">
                                        <div class="progress" data-percentage="60">
                        <span class="progress-left">
                          <span class="progress-bar"></span>
                        </span>
                                            <span class="progress-right">
                          <span class="progress-bar"></span>
                        </span>
                                            <div class="progress-value">
                                                <div>
                                                    60%<br>
                                                    <span>Robotik</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
