<?php

class PinsTableSeeder extends Seeder {

    protected $title_1  = 'Judul 1';
    protected $title_2  = 'Judul 2';
    protected $title_3  = 'Judul 3';
    protected $title_4  = 'Judul 4';
    protected $title_5  = 'Judul 5';
    protected $title_6  = 'Judul 6';
    protected $title_7  = 'Judul 7';
    protected $title_8  = 'Judul 8';
    protected $title_9  = 'Judul 9';
    protected $title_10 = 'Judul 10';

    protected $source_1  = '1.jpg';
    protected $source_2  = '2.jpg';
    protected $source_3  = '3.jpg';
    protected $source_4  = '4.jpg';
    protected $source_5  = '5.jpg';
    protected $source_6  = '6.jpg';
    protected $source_7  = '7.jpg';
    protected $source_8  = '8.jpg';
    protected $source_9  = '9.jpg';
    protected $source_10 = '10.jpg';

    protected $description_1  = 'Deskripsi 1';
    protected $description_2  = 'Deskripsi 2';
    protected $description_3  = 'Deskripsi 3';
    protected $description_4  = 'Deskripsi 4';
    protected $description_5  = 'Deskripsi 5';
    protected $description_6  = 'Deskripsi 6';
    protected $description_7  = 'Deskripsi 7';
    protected $description_8  = 'Deskripsi 8';
    protected $description_9  = 'Deskripsi 9';
    protected $description_10 = 'Deskripsi 10';

    protected $slug_1  = 'pin-1.html';
    protected $slug_2  = 'pin-2.html';
    protected $slug_3  = 'pin-3.html';
    protected $slug_4  = 'pin-4.html';
    protected $slug_5  = 'pin-5.html';
    protected $slug_6  = 'pin-6.html';
    protected $slug_7  = 'pin-7.html';
    protected $slug_8  = 'pin-8.html';
    protected $slug_9  = 'pin-9.html';
    protected $slug_10 = 'pin-10.html';

    public function run()
    {
        DB::table('pins')->delete();

        $user_id       = User::first()->id;
        $storagePath   = public_path() . '/storage/' . $user_id . '/pins/';
        $storagePublic = 'storage/' . $user_id . '/pins/';

        $img       = Image::make( $storagePath . $this->source_1)->resize(570, null, true);
        $new_file  = str_replace(".jpg", "-570w.jpg", $this->source_1);
        $img->save( $storagePath . $new_file );
        $img       = Image::make( $storagePath . $this->source_1)->resize(215, null, true);         
        $new_file2 = str_replace(".jpg", "-215w.jpg", $this->source_1);  
        $img->save( $storagePath . $new_file2 );       

        $img       = Image::make( $storagePath . $this->source_2)->resize(570, null, true);
        $new_file  = str_replace(".jpg", "-570w.jpg", $this->source_2);
        $img->save( $storagePath . $new_file ); 
        $img       = Image::make( $storagePath . $this->source_2)->resize(215, null, true);        
        $new_file2 = str_replace(".jpg", "-215w.jpg", $this->source_2);  
        $img->save( $storagePath . $new_file2 ); 

        $img       = Image::make( $storagePath . $this->source_3)->resize(570, null, true);
        $new_file  = str_replace(".jpg", "-570w.jpg", $this->source_3);
        $img->save( $storagePath . $new_file ); 
        $img       = Image::make( $storagePath . $this->source_3)->resize(215, null, true); 
        $new_file2 = str_replace(".jpg", "-215w.jpg", $this->source_3);  
        $img->save( $storagePath . $new_file2 ); 

        $img       = Image::make( $storagePath . $this->source_4)->resize(570, null, true);
        $new_file  = str_replace(".jpg", "-570w.jpg", $this->source_4);
        $img->save( $storagePath . $new_file ); 
        $img       = Image::make( $storagePath . $this->source_4)->resize(215, null, true); 
        $new_file2 = str_replace(".jpg", "-215w.jpg", $this->source_4);  
        $img->save( $storagePath . $new_file2 );         

        $img       = Image::make( $storagePath . $this->source_5)->resize(570, null, true);
        $new_file  = str_replace(".jpg", "-570w.jpg", $this->source_5);
        $img->save( $storagePath . $new_file );  
        $img       = Image::make( $storagePath . $this->source_5)->resize(215, null, true);                        
        $new_file2 = str_replace(".jpg", "-215w.jpg", $this->source_5);  
        $img->save( $storagePath . $new_file2 ); 

        $img       = Image::make( $storagePath . $this->source_6)->resize(570, null, true);
        $new_file  = str_replace(".jpg", "-570w.jpg", $this->source_6);
        $img->save( $storagePath . $new_file ); 
        $img       = Image::make( $storagePath . $this->source_6)->resize(215, null, true);         
        $new_file2 = str_replace(".jpg", "-215w.jpg", $this->source_6);  
        $img->save( $storagePath . $new_file2 ); 

        $img       = Image::make( $storagePath . $this->source_7)->resize(570, null, true);
        $new_file  = str_replace(".jpg", "-570w.jpg", $this->source_7);
        $img->save( $storagePath . $new_file ); 
        $img       = Image::make( $storagePath . $this->source_7)->resize(215, null, true); 
        $new_file2 = str_replace(".jpg", "-215w.jpg", $this->source_7);  
        $img->save( $storagePath . $new_file2 );         

        $img       = Image::make( $storagePath . $this->source_8)->resize(570, null, true);
        $new_file  = str_replace(".jpg", "-570w.jpg", $this->source_8);
        $img->save( $storagePath . $new_file ); 
        $img       = Image::make( $storagePath . $this->source_8)->resize(215, null, true); 
        $new_file2 = str_replace(".jpg", "-215w.jpg", $this->source_8);  
        $img->save( $storagePath . $new_file2 );         

        $img       = Image::make( $storagePath . $this->source_9)->resize(570, null, true);
        $new_file  = str_replace(".jpg", "-570w.jpg", $this->source_9);
        $img->save( $storagePath . $new_file ); 
        $img       = Image::make( $storagePath . $this->source_9)->resize(215, null, true); 
        $new_file2 = str_replace(".jpg", "-215w.jpg", $this->source_9);  
        $img->save( $storagePath . $new_file2 );         

        $img       = Image::make( $storagePath . $this->source_10)->resize(570, null, true);
        $new_file  = str_replace(".jpg", "-570w.jpg", $this->source_10);
        $img->save( $storagePath . $new_file ); 
        $img       = Image::make( $storagePath . $this->source_10)->resize(215, null, true); 
        $new_file2 = str_replace(".jpg", "-215w.jpg", $this->source_10);  
        $img->save( $storagePath . $new_file2 );         

        DB::table('pins')->insert( array(
            array(
                'user_id'      => $user_id,
                'title'        => $this->title_1,
                'slug'         => $this->slug_1,
                'description'  => $this->description_1,                
                'source'       => $storagePublic . $this->source_1,
                'type'         => 'image',
                'published'    => 1,
                'moderation'   => 1,
                'moderated_by' => 1,
                'moderated_at' => new DateTime,
                'created_at'   => new DateTime,
                'updated_at'   => new DateTime,
            ),
            array(
                'user_id'      => $user_id,
                'title'        => $this->title_2,
                'slug'         => $this->slug_2,
                'description'  => $this->description_2,                
                'source'       => $storagePublic . $this->source_2,
                'type'         => 'image',
                'published'    => 1,
                'moderation'   => 1,
                'moderated_by' => 1,
                'moderated_at' => new DateTime,                
                'created_at'   => new DateTime,
                'updated_at'   => new DateTime,
            ),
            array(
                'user_id'      => $user_id,
                'title'        => $this->title_3,
                'slug'         => $this->slug_3,
                'description'  => $this->description_3,                
                'source'       => $storagePublic . $this->source_3,
                'type'         => 'image',
                'published'    => 1,
                'moderation'   => 1,
                'moderated_by' => 1,
                'moderated_at' => new DateTime,                
                'created_at'   => new DateTime,
                'updated_at'   => new DateTime,
            ),
            array(
                'user_id'      => $user_id,
                'title'        => $this->title_4,
                'slug'         => $this->slug_4,
                'description'  => $this->description_4,                
                'source'       => $storagePublic . $this->source_4,
                'type'         => 'image',
                'published'    => 1,
                'moderation'   => 1,
                'moderated_by' => 1,
                'moderated_at' => new DateTime,                 
                'created_at'   => new DateTime,
                'updated_at'   => new DateTime,
            ),
            array(
                'user_id'      => $user_id,
                'title'        => $this->title_5,
                'slug'         => $this->slug_5,
                'description'  => $this->description_5,                
                'source'       => $storagePublic . $this->source_5,
                'type'         => 'image',
                'published'    => 1,
                'moderation'   => 1,
                'moderated_by' => 1,
                'moderated_at' => new DateTime,                 
                'created_at'   => new DateTime,
                'updated_at'   => new DateTime,
            ),
            array(
                'user_id'      => $user_id,
                'title'        => $this->title_6,
                'slug'         => $this->slug_6,
                'description'  => $this->description_6,                
                'source'       => $storagePublic . $this->source_6,
                'type'         => 'image',
                'published'    => 1,
                'moderation'   => 1,
                'moderated_by' => 1,
                'moderated_at' => new DateTime,                 
                'created_at'   => new DateTime,
                'updated_at'   => new DateTime,
            ),
            array(
                'user_id'      => $user_id,
                'title'        => $this->title_7,
                'slug'         => $this->slug_7,
                'description'  => $this->description_7,                
                'source'       => $storagePublic . $this->source_7,
                'type'         => 'image',
                'published'    => 1,
                'moderation'   => 1,
                'moderated_by' => 1,
                'moderated_at' => new DateTime,                 
                'created_at'   => new DateTime,
                'updated_at'   => new DateTime,
            ),
            array(
                'user_id'      => $user_id,
                'title'        => $this->title_8,
                'slug'         => $this->slug_8,
                'description'  => $this->description_8,                
                'source'       => $storagePublic . $this->source_8,
                'type'         => 'image',
                'published'    => 1,
                'moderation'   => 1,
                'moderated_by' => 1,
                'moderated_at' => new DateTime,                 
                'created_at'   => new DateTime,
                'updated_at'   => new DateTime,
            ),
            array(
                'user_id'      => $user_id,
                'title'        => $this->title_9,
                'slug'         => $this->slug_9,
                'description'  => $this->description_9,                
                'source'       => $storagePublic . $this->source_9,
                'type'         => 'image',
                'published'    => 1,
                'moderation'   => 1,
                'moderated_by' => 1,
                'moderated_at' => new DateTime,                 
                'created_at'   => new DateTime,
                'updated_at'   => new DateTime,
            ),
            array(
                'user_id'      => $user_id,
                'title'        => $this->title_10,
                'slug'         => $this->slug_10,
                'description'  => $this->description_10,                
                'source'       => $storagePublic . $this->source_10,
                'type'         => 'image',
                'published'    => 1,
                'moderation'   => 1,
                'moderated_by' => 1,
                'moderated_at' => new DateTime,                 
                'created_at'   => new DateTime,
                'updated_at'   => new DateTime,
            ))
        );
    }

}
