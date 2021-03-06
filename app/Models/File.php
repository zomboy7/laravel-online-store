<?php

namespace App\Models;

use App\Helpers\Utils;
use App\Scopes\IsNotDeletedScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class File extends Model
{
    # !Constants
    public const MIME_TYPES_IMAGE = 'image';
    public const MIME_TYPES_VIDEO = 'video';
    public const MIME_TYPES_AUDIO = 'audio';
    public const MIME_TYPES_ARCHIVE = 'archive';
    public const MIME_TYPES_DOCUMENT = 'document';
    public const MIME_TYPES_PDF = 'pdf';

    public const TYPES = [
        self::MIME_TYPES_IMAGE => 'model.files.type.image',
        self::MIME_TYPES_VIDEO => 'model.files.type.video',
        self::MIME_TYPES_AUDIO => 'model.files.type.audio',
        self::MIME_TYPES_ARCHIVE => 'model.files.type.archive',
        self::MIME_TYPES_DOCUMENT => 'model.files.type.document',
        self::MIME_TYPES_PDF => 'model.files.type.pdf',
    ];

    # !Parameters
    protected $fillable = ['model_type', 'model_id', 'original_name', 'name', 'disc'];

    protected static function booted()
    {
        static::addGlobalScope(new IsNotDeletedScope());
    }

    # !Relationships
    public function fileModel(): Relation
    {
        return $this->belongsTo(FileModel::class, 'file_id', 'id');
    }

    # !Mutators
   public function getFileUrlAttribute()
   {
       return Storage::url($this->name);
   }

    # !Methods
    static public function store(\SplFileInfo $uploadedFile, ?string $type = null): self
    {
        if(!$uploadedFile instanceof UploadedFile) {
            $uploadedFile = new UploadedFile($uploadedFile, $uploadedFile->getFilename());
        }

        $disc = config('filesystems.default');
        $originalName = $uploadedFile->getFilename();
        $microTime = microtime();
        // TODO: Create FILE PATTERN NAME
        $name = md5("$originalName$microTime").'.'.$uploadedFile->getExtension();
        if($type) {
            $typeData = Utils::getFileTypeConfig($type);
            if($typeData) {
                [
                    'disc' => $disc,
                    'path' => $path
                ] = $typeData;
            }
        }

        $file = new self();
        $file->original_name = $originalName;
        $file->name = "$path$name";
        $file->disc = $disc;
        $file->mime_type = $uploadedFile->getMimeType();
        $file->size = $uploadedFile->getSize();

        $uploadedFile->storeAs($path ?? null, $name, $disc);
        $file->save();
        return $file;
    }
}
