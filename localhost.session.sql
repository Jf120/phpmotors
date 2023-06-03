INSERT INTO inventory (
    invId,
    invMake,
    invModel,
    invDescription,
    invImage,
    invThumbnail,
    invPrice,
    invStock,
    invColor,
    classificationId
  )
VALUES (
    invId:int,
    'invMake:varchar',
    'invModel:varchar',
    'invDescription:text',
    'invImage:varchar',
    'invThumbnail:varchar',
    'invPrice:decimal',
    'invStock:smallint',
    'invColor:varchar',
    classificationId:int
  );