<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained('product_categories')
                  ->nullOnDelete();
            $table->string('title');
            $table->string('price')->nullable();
            $table->text('description')->nullable();
            $table->json('features')->nullable();
            $table->json('specifications')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_blocked')->default(false);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });

        $products = [
            ['category_id'=>1,'title'=>'Designer Reception Table','price'=>'₹ 5,000/Piece','description'=>'Excellent quality and perfect finishing for high customer credibility.','features'=>json_encode(['Excellent quality','Perfect finishing']),'specifications'=>null,'image'=>'reception-table-2-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>1,'title'=>'Standard Reception Table','price'=>'₹ 5,000/Piece','description'=>'Stylish look and easy to clean. Fits easily in any workspace.','features'=>json_encode(['Fits easily','Stylish look','Easy to clean']),'specifications'=>null,'image'=>'reception-table-1-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>2,'title'=>'LSM Conference Table','price'=>'₹ 27,000/Piece','description'=>'High strength and longer service life.','features'=>null,'specifications'=>json_encode(['Size'=>'As Per Requirements','Type'=>'Customized']),'image'=>'conference-table-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>2,'title'=>'Designer Conference Table','price'=>'₹ 24,000/Piece','description'=>'Precisely designed for prestigious corporate clients.','features'=>null,'specifications'=>null,'image'=>'designer-conference-table-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>2,'title'=>'Wooden Conference Table','price'=>'₹ 18,000/Piece','description'=>'High quality wooden finish for professional settings.','features'=>null,'specifications'=>json_encode(['Size'=>'As Per Requirements']),'image'=>'plain-conference-table-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>2,'title'=>'Office Conference Table','price'=>'₹ 24,000/Piece','description'=>'Premium quality offered in pace with market advancement.','features'=>null,'specifications'=>null,'image'=>'office-conference-table-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>2,'title'=>'Glass Conference Table','price'=>'₹ 15,000/Piece','description'=>'Modern glass-top conference solution.','features'=>null,'specifications'=>null,'image'=>'dgm-table-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>2,'title'=>'Room Conference Table','price'=>'₹ 12,000/Piece','description'=>'Optimized for dedicated meeting rooms.','features'=>null,'specifications'=>null,'image'=>'discursion-table-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>2,'title'=>'Standard Conference Table','price'=>'₹ 19,500/Piece','description'=>'Sturdy and professional meeting table.','features'=>null,'specifications'=>null,'image'=>'discursion-table-hq.jpg','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>3,'title'=>'Full Height Office Partition','price'=>'Get Latest Price','description'=>'Sophisticated infrastructure at a reasonable price.','features'=>null,'specifications'=>null,'image'=>'full-height-office-partition-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>3,'title'=>'Portable Office Partitions','price'=>'Get Latest Price','description'=>'Flexible design for modern office layouts.','features'=>null,'specifications'=>null,'image'=>'office-partitions-hq.webp','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>3,'title'=>'Office Aluminum Partition','price'=>'Get Latest Price','description'=>'Durable with a perfect finish.','features'=>json_encode(['Perfect finish','Durable']),'specifications'=>null,'image'=>'1200-ht-partition-hq.webp','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>3,'title'=>'Standard Office Partitions','price'=>'Get Latest Price','description'=>'Compliance with industrial quality standards.','features'=>null,'specifications'=>null,'image'=>'office-partitions-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>3,'title'=>'Glass Office Partition','price'=>'Get Latest Price','description'=>'Transparent modular partition solutions.','features'=>null,'specifications'=>null,'image'=>'glass-office-partition-hq.webp','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>4,'title'=>'Office Executive Table','price'=>'₹ 8,400/Piece','description'=>'Developed with expert knowledge to enhance efficiency.','features'=>null,'specifications'=>json_encode(['Type'=>'Customized']),'image'=>'office-executive-table-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>4,'title'=>'Designer Office Table','price'=>'₹ 9,000/Piece','description'=>'Exclusively designed and highly durable.','features'=>null,'specifications'=>null,'image'=>'designer-office-furniture-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>4,'title'=>'Wooden Office Table','price'=>'₹ 8,200/Piece','description'=>'Finest quality demanded for long service life.','features'=>null,'specifications'=>null,'image'=>'cabin-furniture-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>4,'title'=>'Qualitative Office Table','price'=>'₹ 9,500/Piece','description'=>'Fulfilling the diversified demands of the market.','features'=>null,'specifications'=>null,'image'=>'office-table-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>5,'title'=>'Designer Office Workstation','price'=>'Get Latest Price','description'=>'Available in various sizes for team productivity.','features'=>null,'specifications'=>null,'image'=>'desk-base-workstation-2-hq.webp','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>5,'title'=>'Wooden Office Workstation','price'=>'Get Latest Price','description'=>'Elegant collection precisely designed.','features'=>null,'specifications'=>null,'image'=>'desk-base-workstation-hq.webp','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>5,'title'=>'Desk Office Workstation','price'=>'Get Latest Price','description'=>'Catering to rising demands at reasonable prices.','features'=>null,'specifications'=>null,'image'=>'fancy-desk-base-workstation-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>5,'title'=>'Office Straight Workstation','price'=>'Get Latest Price','description'=>'Modern linear workstation design.','features'=>null,'specifications'=>null,'image'=>'designer-office-workstation-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>6,'title'=>'Storage Cabinet','price'=>'₹ 4,500/Unit','description'=>'Precisely designed through steady R&D.','features'=>null,'specifications'=>json_encode(['Design'=>'Customized']),'image'=>'passage-storage-system-3-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>6,'title'=>'Office Storage Cabinet','price'=>'Get Latest Price','description'=>'Highly durable and reasonably priced.','features'=>null,'specifications'=>null,'image'=>'passage-storage-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['category_id'=>6,'title'=>'Wooden Storage Cabinet','price'=>'Get Latest Price','description'=>'Excellent quality customized wooden storage.','features'=>null,'specifications'=>null,'image'=>'passage-storage-system-2-hq.png','is_blocked'=>false,'is_deleted'=>false,'created_at'=>now(),'updated_at'=>now()]
        ];

        DB::table('products')->insert($products);
    }

    public function down(): void
    {
        DB::table('products')->truncate();
        Schema::dropIfExists('products');
    }
};