#! bin/sh

if [ ! -s ".env" ]; then
    cp env.example .env
fi