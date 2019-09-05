<?php
class Translate{
  public function __construct($lang){
    if($lang == "KA")
      $this->default = array();
    if ($lang == "EN"){
      $this->default = array(
    // ნავიგაცია
    "სიახლეები" => "News Updates",
    "პროექტები" => "Projects",
      "მიმდინარე პროექტები" => "Ongoing Projects",
      "განხორციელებული პროექტები" => "Completed Projects",
      "ინფრასტრუქტურული პროექტები" => "Infrastructural Projects",
      "გენ-გეგმა" => "Major Plan",
    "გალერეა" => "Gallery",
    "ჩვენს შესახებ" => "About Us",
    "კონტაქტი" => "Contact Us",
          
    // Headings & Titles
    "სამშენებლო კომპანია" => "Building Company",
    "ინფრასტრუქტურული პროექტები" => "Infrastructural Projects",
    "გენერალური გეგმა" => "Major Plan",
    "ჰაუს მარკეტი" => "House Market",
    "საბავშვო ბაღი" => "Wonderland Preschool",
    "სართული" => "Floor",
    "სართულის გეგმა" => "The Plan Of The Floor",
    "შერჩეულია სართული" => "Selected Floor",
    "კონკრეტული სართულის სქემის სანახავად დააჭირეთ შესაბამის სართულს ფოტოზე." => "To see the plan of a specific floor click corresponding floor on the picture above",
    "კონკრეტული ბინის მონაცემების სანახავად დააჭირეთ შესაბამის ბინის ნომერს ფოტოზე." => "To see the properties of a specific apartment click corresponding flat on the picture above",
        
    // About ნავიგაცია
    "საკონტაქტო ინფორმაცია" => "Contact Info",
    "ჩვენი სერვისები" => "Our Services",
    "მდებარეობა და ინფრასტრუქტურა" => "Location & Infrastructure",
    "სამშენებლო მასალები და ტექნოლოგიები" => "Construction materials and technologies",
    "ხშირად დასმული შეკითხვები" => "FAQ",
    "რჩევები მყიდველს" => "Advices to the buyers",
        
    // ღილაკები
    "გაიგეთ მეტი" => "Learn more",
    "უფრო ვრცლად" => "Read more",
    "სრულად ნახვა" => "Load more",
    "გაგზავნა" => "Send Message",
    "უკან" => "Back",
        
    // Typed.js
    "ჩვენ ვქმნით თქვენთვის" => "We create for you",
    "მყუდრო გარემოს" => "A Cozy atmosphere",
    "ხარისხიან ინფრასტრუქტურას" => "Quality infrastructure",
    "თანამედროვე დიზაინს" => "Modern design",
    "ტრიდე ჯგუფი" => "tride GROUP",
        
    // დიდი ტექსტები
    "სამშენებლო კომპანია „ტრიდე“ 2007 წელს დაარსდა. სადღეისოდ იგი მზარდ დინამიურ ორგანიზაციას წარმოადგენს, რომელიც სამშენებლო ბაზარზე ფართომასშტაბიან სამუშაოებს ახორციელებს. შექმნის დღიდან „ტრიდე“ ქმნის ინოვაციურ და ორიგინალურ პროექტებს, რომელშიც თანამედროვე არქიტექტურისა და ბინათმშენებლობის მოთხოვნები შერწმულია მომხმარებლების ყველა სურვილსა და საჭიროებასთან." => "Founded in 2007 TRIDE building company has grown into a dynamically developing organization that has been implementing large-scale projects in the development market. TRIDE develops innovative and original designs that combine the requirements of modern architecture with the customer’s needs and desires.",
    "სამშენებლო კომპანია „ტრიდე“ 2007 წელს დაარსდა. სადღეისოდ იგი მზარდ დინამიურ ორგანიზაციას წარმოადგენს, რომელიც სამშენებლო ბაზარზე ფართომასშტაბიან სამუშაოებს ახორციელებს." => "Founded in 2007 TRIDE building company has grown into a dynamically developing organization that has been implementing large-scale projects in the development market.",
    "\"ტრიდე ჯგუფის\" მიზანი და აუცილებელი პირობა, მომხმარებლისათვის მაქსიმალური კომფორტისა და სასიამოვნო გარემოს შექმნაა. <br>სწორედ მომხმარებლისათვის დამატებითი კომფორტის შესაქმნელად , 2014 წლის დეკემბრიდან ჩვენივე კომპლექსის \"ბ\" კორპუსის პირველ სართულზე გაიხსნა ადგილობრივი ბრენდი - \"ჰაუს მარკეტი\". <br>სუპერმარკეტი 750 კვ.მ ზეა განლაგებული და წარმოდგენილია ათასობით დასახელების პროდუქტი. მომხმარებელს შეუძლია შეიძინოს, როგორც სასურსათო და საოჯახო, ასევე, საკონდიტრო ნაწარმი და მზა პროდუქტები. <br>მომხმარებელს ასევე შეუძლია ისარგებლოს მარკეტში მოქმედი კაფით." => "Our objective and aspiration is to provide maximum comfort and pleasant environment for our clients. <br>To this end, in December 2014 we unveiled House Market, a domestic brand, on the first floor of the building B in our complex. <br>The supermarket is located on 750 square meter space and trades in thousands of various products. Our clients are able to buy food products and family appliances, confectionaries and finished products there. <br>Customers can aslo use the cafe that is located in the market.",
    "თანამედროვე სტანდარტების საბავშვო ბაღი „ტრიდეს“ მორიგი ინფრასტრუქტურული პროექტია,რომელიც „დიღმის პარკში“ცხოვრებას კიდევ უფრო კომფორტულს ხდის. 150 ბავშვზე გათვლილი ბაღი ფუნქციონირებს 2016წლის 1 ოქტომბრიდან. მეტი ინფორმაციისთვის დაუკავშირდით ბაღის ადმინისტრაციას." => "Tride Group plans to implement a new infrastructure project and build a modern-standard bursary school to make the living environment in the Dighomi Park more comfortable. The nursery school for 150 children started functioning on the 1st october, 2016. For further information, please contact the nursery school administration",
          
    // იარლიყები
    "სახელი" => "Your Name",
    "ელ-ფოსტა" => "E-mail",
    "ტელეფონი" => "Phone",
    "ლუბლიანას ქ. 11" => "Lubliana Str. 11",
    "ბელიაშვილის ქ. 22" => "Beliashvili Str. 22",
    "შეტყობინება" => "Message",
    "ყველა ველის შევსება აუცილებელია" => "All the fields are required",
    "ყველა უფლება დაცულია" => "All rights reserved",
    "ფოტო ალბომები" => "Photo albums",
    "ვიდეოები" => "Videos");
    }
    if ($lang == "RU"){
      $this->default = array(
// რუსული თარგმანი *********************************
    // ნავიგაცია
    "სიახლეები" => "Новости",
    "პროექტები" => "Проекты",
      "მიმდინარე პროექტები" => "Текущее проекты",
      "განხორციელებული პროექტები" => "Осуществленные проекты",
      "ინფრასტრუქტურული პროექტები" => "Инфраструктурные проекты",
      "გენ-გეგმა" => "Ген-план",
    "გალერეა" => "Галерея",
    "ჩვენს შესახებ" => "О нас",
    "კონტაქტი" => "Контакт",
          
    // Headings & Titles
    "სამშენებლო კომპანია" => "Строительная компания",
    "ინფრასტრუქტურული პროექტები" => "Инфраструктурные проекты",
    "გენერალური გეგმა" => "Генеральный план",
    "ჰაუს მარკეტი" => "Хаус маркет",
    "საბავშვო ბაღი" => "Детский сад",
    "სართული" => "Этаж",
    "სართულის გეგმა" => "План этажа",
    "შერჩეულია სართული" => "Выбранный этаж",
    "კონკრეტული სართულის სქემის სანახავად დააჭირეთ შესაბამის სართულს ფოტოზე." => "Чтобы увидеть план конкретного этажа, щелкните соответствующий пол на картинке.",
    "კონკრეტული ბინის მონაცემების სანახავად დააჭირეთ შესაბამის ბინის ნომერს ფოტოზე." => "Чтобы посмотреть свойства конкретной квартиры, нажмите соответствующую квартиру на картинке.",
        
    // About ნავიგაცია
    "საკონტაქტო ინფორმაცია" => "Контактная информация",
    "ჩვენი სერვისები" => "Наши сервисы",
    "მდებარეობა და ინფრასტრუქტურა" => "Местонахождение и инфраструктура",
    "სამშენებლო მასალები და ტექნოლოგიები" => "Строительные материалы и технологии",
    "ხშირად დასმული შეკითხვები" => "Вопросы-Ответы",
    "რჩევები მყიდველს" => "Советы покупателю",
        
    // ღილაკები
    "გაიგეთ მეტი" => "Узнайте больше",
    "უფრო ვრცლად" => "Подробнее",
    "სრულად ნახვა" => "Подробнее",
    "გაგზავნა" => "Отправить сообщение",
    "უკან" => "Назад",
        
    // Typed.js
    "ჩვენ ვქმნით თქვენთვის" => "Мы создаем для Вас",
    "მყუდრო გარემოს" => "уютную атмосферу",
    "ხარისხიან ინფრასტრუქტურას" => "Качественную инфраструктуру",
    "თანამედროვე დიზაინს" => "Современный дизайн",
    "ტრიდე ჯგუფი" => "ТРИДЕ ГРУП",
        
    // დიდი ტექსტები
    "სამშენებლო კომპანია „ტრიდე“ 2007 წელს დაარსდა. სადღეისოდ იგი მზარდ დინამიურ ორგანიზაციას წარმოადგენს, რომელიც სამშენებლო ბაზარზე ფართომასშტაბიან სამუშაოებს ახორციელებს. შექმნის დღიდან „ტრიდე“ ქმნის ინოვაციურ და ორიგინალურ პროექტებს, რომელშიც თანამედროვე არქიტექტურისა და ბინათმშენებლობის მოთხოვნები შერწმულია მომხმარებლების ყველა სურვილსა და საჭიროებასთან." => "Строительная компания «Триде» была основана в 2007 году. На сегодняшний день она представляет собой растущую динамичную организацию, которая осуществляет широкомасштабные работы на строительном рынке. Со дня своего основания «Триде» создает инновационные и оригинальные проекты, в которых требования современной архитектуры и квартиростроения сливаются со всеми желаниями и нуждами потребителей.",
    "სამშენებლო კომპანია „ტრიდე“ 2007 წელს დაარსდა. სადღეისოდ იგი მზარდ დინამიურ ორგანიზაციას წარმოადგენს, რომელიც სამშენებლო ბაზარზე ფართომასშტაბიან სამუშაოებს ახორციელებს." => "Строительная компания «Триде» была основана в 2007 году. На сегодняшний день она представляет собой растущую динамичную организацию, которая осуществляет широкомасштабные работы на строительном рынке.",
    "\"ტრიდე ჯგუფის\" მიზანი და აუცილებელი პირობა, მომხმარებლისათვის მაქსიმალური კომფორტისა და სასიამოვნო გარემოს შექმნაა. <br>სწორედ მომხმარებლისათვის დამატებითი კომფორტის შესაქმნელად , 2014 წლის დეკემბრიდან ჩვენივე კომპლექსის \"ბ\" კორპუსის პირველ სართულზე გაიხსნა ადგილობრივი ბრენდი - \"ჰაუს მარკეტი\". <br>სუპერმარკეტი 750 კვ.მ ზეა განლაგებული და წარმოდგენილია ათასობით დასახელების პროდუქტი. მომხმარებელს შეუძლია შეიძინოს, როგორც სასურსათო და საოჯახო, ასევე, საკონდიტრო ნაწარმი და მზა პროდუქტები. <br>მომხმარებელს ასევე შეუძლია ისარგებლოს მარკეტში მოქმედი კაფით." => "Целью и непременным условием «Триде Группы» является создание для потребителя максимального комфорта и приятной обстановки. <br>Именно для создания дополнительного комфорта для потребителей с декабря 2014 года на первом этаже корпуса «Б» нашего же комплекса открылся местный бренд – «Хаус маркет». <br>Супермаркет размещен на 750 кв. м, и в нем представлены продукты тысяч наименований. <br>Потребитель может приобрести как продовольственные и семейные, так и кондитерские изделия и готовые продукты. Клиенты могут также воспользоваться текущей рыночной кафе.",
    "თანამედროვე სტანდარტების საბავშვო ბაღი „ტრიდეს“ მორიგი ინფრასტრუქტურული პროექტია,რომელიც „დიღმის პარკში“ცხოვრებას კიდევ უფრო კომფორტულს ხდის. 150 ბავშვზე გათვლილი ბაღი ფუნქციონირებს 2016წლის 1 ოქტომბრიდან. მეტი ინფორმაციისთვის დაუკავშირდით ბაღის ადმინისტრაციას." => "Детский сад современного стандарта является очередным инфраструктурным проектом «Триде», который сделает жизнь в «Дигомском парке» еще более комфортной. Рассчитанный на 150 детей сад начал свою работу 1 октября 2016. Для получения более подробной информации",
          
    // იარლიყები
    "სახელი" => "Ваше имя",
    "ელ-ფოსტა" => "Эл. почта",
    "ტელეფონი" => "Телефон",
    "ლუბლიანას ქ. 11" => "Ул. Лублиана 11",
    "ბელიაშვილის ქ. 22" => "Ул. Белиашвили 22",
    "შეტყობინება" => "Сообщение",
    "ყველა ველის შევსება აუცილებელია" => "Все поля обязательны для заполнения",
    "ყველა უფლება დაცულია" => "Все права защищены",
    "ფოტო ალბომები" => "Фотоальбомы",
    "ვიდეოები" => "Видео");
    }
  }

  public function translate($caption){
    return isset($this->default[$caption]) ? $this->default[$caption] : $caption;
  }
}

$translator = new Translate($lang);