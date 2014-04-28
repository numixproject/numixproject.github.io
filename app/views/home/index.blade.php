@extends("master")
@section("content")
	{{HTML::script("js/main-animate.js")}}
	<section id="home">
            <div class="objects">
              <span><img src="./img/objects/cloud1.svg" /></span>
              <span><img src="./img/objects/cloud3.svg" /></span>
              <span><img src="./img/objects/cloud2.svg" /></span>
            </div>
            <div class="content">
                <h1>Not just yet another theme suite</h1>
                <p>Numix is all about making a difference in theming. We aim to prove that "difference" and "usability" are two words combined, that can make sense. You get a modern and stylish desktop, spiced up with a pinch of warmth just enough to make you feel like laying in your favourite comfy armchair, with a beverage of your choice in hand.</p>
                <p>If you wanna have a taste of a cuppa something different or just long for theming your desktop in a jazzy way, Numix might just be the thing you need. :)</p>
                <a class="button" href="#projects">Get Numix!</a>
            </div>
        </section>
        <section id="projects">
            <div class="content">
                <div class="thumbgrid">
                </div>
                <h1>Live on the edge</h1>
                <p>We have made you repositories to easily install up-to-date releases of various Numix artworks.</p>
                <p>If you use Ubuntu, add our Ubuntu PPA to get Numix packages. Fire up a Terminal and run the following:</p>
                <code>sudo add-apt-repository <a class="ui-text-white" href="https://launchpad.net/~numix/+archive/ppa">ppa:numix/ppa</a></code>
                <p>For Fedora, Red Hat and OpenSUSE, we have setup repos on <a href="https://build.opensuse.org/project/show/home:paolorotolo:numix">OpenSUSE build service</a>.</p>
                <p>Alternatively, if you are on Fedora, install <a href="http://satya164.github.io/fedorautils/">Fedora Utils</a> and run the following command in the Terminal:</p>
                <code>sudo fedorautils -e install_numix</code>
                <h1>Show your <span class="icon-heart red"></span></h1>
                <p>Designing and maintaining a visual brand ain't easy, folks. In fact it takes plenty of time and effort to maintain and constantly improve as big, popular and polished brand as Numix. Regrettably we don't make enough revenue from the project to be able to work full time on it as our job, which lowers the quality and the cadence of our products. </p>
                <p>Fancy changing that and as a result getting better products released on tighter schedule? Well, than by all means don't hesitate to chip in a few bucks at our screens. We would very much appreciate such a gesture. ;)</p>
                <form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="motorslav@gmail.com">
                    <input type="hidden" name="item_name" value="Donation to Numix">
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="return" value="http://numixproject.org">
                    <span class="currency">$</span>
                    <input name="amount" type="entry" value="5.00" onkeyup="this.value=this.value.replace(/[^\d^\.]/,'')">
                    <input type="submit" value="Donate">
                    <span class="padding-small">OR</span>
                    <!-- bitcoin starts -->
                    

                    <a class="bitcoin-button" data-code="5f9456e0b510db7617dfe9e48c3f4847"  href="https://coinbase.com/checkouts/5f9456e0b510db7617dfe9e48c3f4847"><i class="fa fa-btc"></i>   Donate Bitcoins</a><script src="https://coinbase.com/assets/button.js" type="text/javascript"></script>
                <!-- bitcoin ends -->
                </form>
                
            </div>
        </section>
        <section id="design">
            <div class="content">
                <h1>Elements</h1>
                <p>The theme elements follow a modern design, with subtle shadow effects and roundness. We use <a href="http://opensans.com">Open Sans</a> as our standard font.</p>
                <h1>Colour palette</h1>
                <p>Numix red (<a href="http://www.colorhexa.com/d64937">#d64937</a>) is the standard accent colour in our colour palette. Other neutral colours are used in various UI elements in the Numix themes. Here is our colour palette with appropriate colours used in foreground text and background fill.</p>
                <div class="palette">
                    <div>#f9f9f9</div>
                    <div>#dedede</div>
                    <div>#d64937</div>
                    <div>#333333</div>
                    <div>#2d2d2d</div>
                </div>
                <h1>Icon design</h1>
                <img src="./img/numix-icon-design.png" />
                <p>Our icon themes use vivid colours and a unique design. We have established some guidelines for the icon themes to ensure beautiful and crisp looking icons. The icons are created purely with Open Source tools such as Inkscape.</p>
            </div>
        </section>
            @include('home.form')
        <section id="about">
            <div class="content">
                <h1>Our team</h1>
                <p>We are a devoted team of three, from different countries across the world, collaborating to create the whole Numix experience.</p>
                <div class="team">
                </div>
            </div>
        </section>
        <footer>
            <div class="content">
                &#169; 2013 <a href="https://plus.google.com/115833527622591803679" rel="publisher">Numix Project</a>. The website and all the associated are licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.en_US">Creative Commons Attribution-ShareAlike 3.0 Unported License</a>.
            </div>
        </footer>
        <div id='social'>
            <ul>
                <li><a href="https://plus.google.com/115833527622591803679"><span class="icon-gplus"></span></a></li>
                <li><a href="https://www.facebook.com/numixproject"><span class="icon-facebook"></li>
                <li><a href="https://twitter.com/numixproject"><span class="icon-twitter"></span></a></li>
                <li><a href="https://github.com/numixproject"><span class="icon-github"></span></a></li>
            </ul>
		    </div>
@stop