# Space Jub
Преносимо устройство с множество сензори, което изпраща събраните от тях данни по Bluetooth до уеб сървър, където те биват запазени в база данни за определено време. Когато потребител достъпи сайта, му бива предоставена информацията от базата данни под формата на таблица, както и няколко на брой графики, за да бъде по-лесно проследяването на промените в стойностите. Сензорите са главно за отчитане на концентрации на различни газове, като има и сензор за температура. При достигане на стойности извън нормата се задейства звукова аларма. Предвидено е да се постави в помещение на космическа станция, където да измерва качеството на въздуха.

## Външни библиотеки и програми
За четене от COM порта използваме библиотеката pySerial, която може да бъде инсталирана със следната команда:``

```pip install pyserial```

Използвани са готови програми за калибрация на сензори, които могат да бъдат намерени в папката `/arduino`.

## Хардуерна реализация
![tvyrda tehnologiq](/readme_pics/hard.jpg)

## Потребителски интерфейс
![mejdina na potrebitelq](/readme_pics/ui.png)

## Принципна електрическа схема
![izobrajenie na shematikata](/readme_pics/schematic_image.png)
jub jub jub.
