<?php
    require_once "includes/header.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
</head>
<body>
    <div class="about-wrapper">
        <?php if(isset($_COOKIE['lang_code']) && $_COOKIE['lang_code']==='en'){ ?>
        <div class="about">
            <h2 class="about-head">About</h2>
                <p>
                    TLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                </p>
                <p>
                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                </p>


                <p>
                    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                </p>

                <p>
                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                </p>
        </div>
        <?php }else{ ?>
        <div class="about">
            <h2 class="about-head">के बारे में</h2>
                <p>
                    प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है। लोरेम इप्सम 1500 के दशक के बाद से उद्योग का मानक डमी टेक्स्ट रहा है, जब एक अज्ञात प्रिंटर ने गैली का प्रकार लिया और एक प्रकार की नमूना पुस्तक बनाने के लिए इसे खंगाला। यह न केवल पांच शताब्दियों तक जीवित रहा है, बल्कि इलेक्ट्रॉनिक टाइपसेटिंग में भी छलांग लगाई है, जो अनिवार्य रूप से अपरिवर्तित है। इसे 1960 के दशक में लोरेम इप्सम पैसेज वाले लेट्रासेट शीट्स के रिलीज के साथ लोकप्रिय किया गया था, और हाल ही में डेस्कटॉप प्रकाशन सॉफ्टवेयर जैसे एल्डस पेजमेकर के साथ लोरेम इप्सम के संस्करण भी शामिल थे।
                </p>
                <p>
                    यह एक लंबे समय से स्थापित तथ्य है कि एक पाठक किसी पृष्ठ की पठनीय सामग्री से उसके लेआउट को देखते हुए विचलित हो जाएगा। लोरेम इप्सम का उपयोग करने की बात यह है कि इसमें 'यहां सामग्री, सामग्री यहां' का उपयोग करने के विपरीत, अक्षरों का अधिक या कम सामान्य वितरण है, जिससे यह पठनीय अंग्रेजी जैसा दिखता है। कई डेस्कटॉप प्रकाशन पैकेज और वेब पेज संपादक अब लोरम इप्सम को अपने डिफ़ॉल्ट मॉडल टेक्स्ट के रूप में उपयोग करते हैं, और 'लोरेम इप्सम' की खोज कई वेब साइटों को अभी भी अपनी प्रारंभिक अवस्था में उजागर करेगी। विभिन्न संस्करण वर्षों में विकसित हुए हैं, कभी-कभी दुर्घटना से, कभी-कभी उद्देश्य पर (इंजेक्शन हास्य और इसी तरह)।
                </p>
                <p>
                    लोकप्रिय धारणा के विपरीत, लोरेम इप्सम केवल यादृच्छिक पाठ नहीं है। इसकी जड़ें 45 ईसा पूर्व के शास्त्रीय लैटिन साहित्य में हैं, जो इसे 2000 वर्ष से अधिक पुराना बनाती है। वर्जीनिया में हैम्पडेन-सिडनी कॉलेज के एक लैटिन प्रोफेसर रिचर्ड मैक्लिंटॉक ने लोरेम इप्सम मार्ग से अधिक अस्पष्ट लैटिन शब्दों में से एक को देखा, और शास्त्रीय साहित्य में शब्द के उद्धरणों के माध्यम से, निस्संदेह स्रोत की खोज की। लोरेम इप्सम 45 ईसा पूर्व में लिखे गए सिसेरो द्वारा "डी फिनिबस बोनोरम एट मालोरम" (द एक्सट्रीम ऑफ गुड एंड एविल) के खंड 1.10.32 और 1.10.33 से आता है। यह पुस्तक नैतिकता के सिद्धांत पर एक ग्रंथ है, जो पुनर्जागरण के दौरान बहुत लोकप्रिय था। लोरेम इप्सम की पहली पंक्ति, "लोरेम इप्सम डोलर सिट एमेट ..", खंड 1.10.32 की एक पंक्ति से आती है।
                </p>
                <p>
                    लोरेम इप्सम का मानक हिस्सा 1500 के दशक से उपयोग किया जाता है, रुचि रखने वालों के लिए नीचे पुन: प्रस्तुत किया गया है। सिसरो द्वारा "डी फिनिबस बोनोरम एट मालोरम" के खंड 1.10.32 और 1.10.33 को भी उनके सटीक मूल रूप में पुन: प्रस्तुत किया गया है, साथ में एच. रैकहम द्वारा 1914 के अनुवाद से अंग्रेजी संस्करण भी शामिल हैं।
                </p>

                <p>
                    लोरेम इप्सम के अंशों के कई रूप उपलब्ध हैं, लेकिन अधिकांश लोगों को किसी न किसी रूप में, इंजेक्शन वाले हास्य, या यादृच्छिक शब्दों से परिवर्तन का सामना करना पड़ा है, जो थोड़ा सा भी विश्वसनीय नहीं लगता है। यदि आप लोरेम इप्सम के एक अंश का उपयोग करने जा रहे हैं, तो आपको यह सुनिश्चित करने की आवश्यकता है कि पाठ के बीच में कुछ भी शर्मनाक नहीं छिपा है। इंटरनेट पर सभी लोरम इप्सम जनरेटर आवश्यकतानुसार पूर्वनिर्धारित विखंडू को दोहराते हैं, जिससे यह इंटरनेट पर पहला सच्चा जनरेटर बन जाता है। यह लोरेम इप्सम उत्पन्न करने के लिए 200 से अधिक लैटिन शब्दों के एक शब्दकोश का उपयोग करता है, जो कुछ हद तक मॉडल वाक्य संरचनाओं के साथ संयुक्त है, जो उचित दिखता है। इसलिए उत्पन्न लोरेम इप्सम हमेशा दोहराव, इंजेक्शन वाले हास्य, या गैर-विशेषता वाले शब्दों आदि से मुक्त होता है।
                </p>
        </div>
        <?php } ?>
        <?php include('includes/side_content.php')?>
    </div>
</body>
</html>
<?php
    require_once "includes/footer1.php";
?>