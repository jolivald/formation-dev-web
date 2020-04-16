# Memo


## Doctrine

Pour générer les modèles:

```sh
php vendor/bin/doctrine orm:convert:mapping --from-database --namespace='Jonathan\\Models\\' annotation models
```

Pour générer les proxies:

```sh
php vendor/bin/doctrine orm:generate-proxies
```
