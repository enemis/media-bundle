#Media bundle - the easiest way to manipulate your media.
## Какую проблему решаем и что послужило побудило разработать данный проект для управления медия?
    Главная проблема sonata media-bundle в том что он является частью экосистемы соната, а значит для управления медиа файлами вам нужно установить:   
        sonata core, sonata block bundle, sonata admin. Но данные бандлы не всегда нужны, например у вас свой админ интерфейс или ваш проект будет конфликтовать с зависимости сонаты. 
 ## Цели проекта:
  - Избавиться от ненужныж зависимостей для проектов
  - Избежать Dependency hell для существующих проектов при интеграции с media-bundle
  - Уменьшить кодовую базу, а значит упростить развитие
  - Увеличить кол-во провайдеров и позволить использовать только нужные провайдеры
  - Реализовать возможность использовать несколько разных наборов entity с разным набором настроек для каждой группы
  - Реализовать легкую интеграцию с Liip imagine
  - Использовать knp_gaufrette для хранения media убрав адаптеры из кода media bundle
  - Оптимизировать хранилища убрав редко используемые поля, оставив при необходимости возможность добавить их. Убраны author_name, copyright
  
## Установка
    Добавить в bundles.php:
    `    Enemis\MediaBundle\EnemisMediaBundle::class => ['all' => true],
         Knp\Bundle\GaufretteBundle\KnpGaufretteBundle::class => ['all' => true],
         Sonata\Doctrine\Bridge\Symfony\SonataDoctrineSymfonyBundle::class => ['all' => true],`
         
## Настройка 
### Создание Entities
    Создайте сущности для каждого контекста можно использовать одни и теже сущности и таблицы для разных контекстов либо создать разные
    
    ### \App\Entity\Media.php
    `<?php
     
     declare(strict_types=1);
     
     namespace App\Entity;
     
     use Enemis\MediaBundle\Entity\BaseMedia;
     use Doctrine\ORM\Mapping as ORM;
     use App\Repository\MediaRepository;
     
     /**
      * @ORM\Entity(repositoryClass=MediaRepository::class)
      */
     class Media extends BaseMedia
     {
         /**
          * @ORM\Id()
          * @ORM\GeneratedValue()
          * @ORM\Column(type="integer")
          */
         private $id;
     
         public function getId(): ?int
         {
            return $this->id;
         }
     }`
     
         ### \App\Entity\Gallery.php
         `<?php
          
          declare(strict_types=1);
          
          namespace App\Entity;
          
          use Enemis\MediaBundle\Entity\BaseMedia;
          use Doctrine\ORM\Mapping as ORM;
          use App\Repository\GalleryRepository;
          
          /**
           * @ORM\Entity(repositoryClass=GalleryRepository::class)
           */
          class Gallery extends BaseMedia
          {
              /**
               * @ORM\Id()
               * @ORM\GeneratedValue()
               * @ORM\Column(type="integer")
               */
              private $id;
          
              public function getId(): ?int
              {
                 return $this->id;
              }
          }
`
         ### \App\Entity\GalleryHasMedia.php
         `<?php
          
          declare(strict_types=1);
          
          namespace App\Entity;
          
          use Enemis\MediaBundle\Entity\BaseGalleryHasMedia;
          use Doctrine\ORM\Mapping as ORM;
          
          /**
           * @ORM\Entity()
           */
          class GalleryHasMedia extends BaseGalleryHasMedia
          {
              /**
               * @ORM\Id()
               * @ORM\GeneratedValue()
               * @ORM\Column(type="integer")
               */
              private $id;
          
              public function getId(): ?int
              {
                  return $this->id;
              }
          }
         `
         
         #Репозитории?
         
         
         Затем нужно выполнить обновить схему базы данных. 
         Для получения звпросов которые должны выполнится выполните
         `$ bin/console doctrine:schema:update --dump-sql`
         
         Для внесение изменений рекомендуется использовать миграции либо если вы только начинаете проект:
         `$ bin/console doctrine:schema:update --force`
         
         Данная команда создаст необходимые таблицы.
        
Написать про возможность хранение оригиналов на амазон а кеш отдельно
  
  
