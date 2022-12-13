let popupBg = document.querySelector('.popup__bg','.popup__bg1'); // Фон попап окна
let popup = document.querySelector('.popup','.popup1'); // Само окно
let openPopupButtons = document.querySelectorAll('.open-popup','.open-popup1'); // Кнопки для показа окна
let closePopupButton = document.querySelector('.close-popup','.close-popup1'); // Кнопка для скрытия окна


openPopupButtons.forEach((button) => { // Перебираем все кнопки
  button.addEventListener('click', (e) => { // Для каждой вешаем обработчик событий на клик
      e.preventDefault(); // Предотвращаем дефолтное поведение браузера
      popupBg.classList.add('active'); // Добавляем класс 'active' для фона
      popup.classList.add('active'); // И для самого окна
  })
});

closePopupButton.addEventListener('click',() => { // Вешаем обработчик на крестик
  popupBg.classList.remove('active'); // Убираем активный класс с фона
  popup.classList.remove('active'); // И с окна
});

document.addEventListener('click', (e) => { // Вешаем обработчик на весь документ
  if(e.target === popupBg) { // Если цель клика - фот, то:
      popupBg.classList.remove('active'); // Убираем активный класс с фона
      popup.classList.remove('active'); // И с окна
  }
});

