# Contao Judge.me Bundle

This bundle provides a simple integration of the Judge.me review system into Contao.\
It does not use the JS script provided by Judge.me, but instead uses the API to fetch the reviews and display them in a custom way.\
Because of that it also does not require the Awesome plan, but the free plan is sufficient.

## Compatibility

Contao 4.13 & 5.*

## Configuration

Set the Judge.me shop domain and API keys in the root page.
<img width="1372" alt="image" src="https://github.com/lukasbableck/contao-judgeme-bundle/assets/42083846/158e4f0e-e8bd-451f-8002-6c7aeb8d86d5">
Refer to the [Judge.me documentation](https://help.judge.me/en/articles/8409180-judge-me-api#h_53f70ac190) to find out how to retrieve the API keys.


Create a content element of type "Judge.me Reviews" and set the product id of the product you want to display the reviews for.
<img width="1372" alt="image" src="https://github.com/lukasbableck/contao-judgeme-bundle/assets/42083846/c6b2faf1-33d6-42b5-8025-90450da12af3">
Refer to the [Judge.me documentation](https://help.judge.me/en/articles/8223133-finding-product-id-and-product-handle) to find out where to find the product id. 
