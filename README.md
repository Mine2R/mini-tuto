# Mini Tuto — Cartes médias (PHP + JS)

## Lancer
Backend :
  cd backend-fixed
  php -S localhost:8000

Frontend :
  cd ../frontend-fixed
  php -S localhost:5500   # ou: python3 -m http.server 5500

## Images
Placer dans backend-fixed/images/ :
  {id}_cover.jpg  {id}_title.png  {id}_hover.png

## Notes
- Le backend retourne JSON à http://localhost:8000
- Le frontend fait fetch(...) et génère les cartes dynamiquement
