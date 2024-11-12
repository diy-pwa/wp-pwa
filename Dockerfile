FROM mcr.microsoft.com/devcontainers/javascript-node:latest
RUN mkdir -p /wordpress
WORKDIR /wordpress
CMD ["npx", "wp-pwa", "dev"]