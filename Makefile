.PHONY: dcu dcd dca dcm

dcu:
	docker compose up -d

dcd:
	docker compose down

dca:
	docker compose exec php php artisan $(ARGS)

dcm:
	docker compose exec php php artisan make:$(ARGS)
