#!/bin/bash

# Directory containing the background images
IMAGE_DIR="/root/php/docker-compose-lamp/www/assets/images/backgrounds"

# File to store the current background image name
CURRENT_BACKGROUND_FILE="/root/php/docker-compose-lamp/www/assets/current_background.txt"

while true; do
  # Get a list of background image filenames
  IMAGES=($(cat "/root/php/docker-compose-lamp/www/assets/image_list.txt"))

  for image in "${IMAGES[@]}"; do
    echo "$image" > "$CURRENT_BACKGROUND_FILE"
    sleep 300 # Wait for 5 minutes
  done
done

