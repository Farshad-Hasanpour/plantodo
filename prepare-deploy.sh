#!/bin/bash
# Delete old directory
rm -rf upload

# Define Upload Directories
PUBLIC_DIR="upload/public_html"
PRIVATE_DIR="upload/private"
VENDOR_DIR="upload/vendor"

# Create Upload Directories
mkdir -p "$PUBLIC_DIR"
mkdir -p "$PRIVATE_DIR"
mkdir -p "$VENDOR_DIR"

# Copy public directory
cp -r public "$PUBLIC_DIR"

# Copy private directories
for dir in app bootstrap config resources routes storage; do
  cp -r "$dir" "$PRIVATE_DIR/$dir"
done

# Copy individual private files
mkdir -p "$PRIVATE_DIR/public/build"
cp public/build/manifest.json "$PRIVATE_DIR/public/build/manifest.json"
cp artisan "$PRIVATE_DIR/artisan"
cp composer.json "$PRIVATE_DIR/composer.json"
cp composer.lock "$PRIVATE_DIR/composer.lock"

# Separate vendor files because it is uploaded only when composer file is changed
cp -r vendor/* "$VENDOR_DIR"

echo -e "\e[31m You should copy .env file manually. \e[0m"

