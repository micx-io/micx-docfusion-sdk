<?php

namespace Micx\SDK\Docfusion;

enum DocfusionDocumentFormat: string
{
    // Pdf, png, jpg, tiff, gif, bmp, svg
    case Image = "image";

    case VectorImage = "vector-image";

    // docx, pptx, xlsx
    case PDF = "pdf";


}
