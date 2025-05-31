#!/bin/bash
# Define Upload Directories
PUBLIC_DIR="upload/public"
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
cp .env "$PRIVATE_DIR/.env"
cp artisan "$PRIVATE_DIR/artisan"

# Separate vendor files because it is uploaded only when composer file is changed
cp -r vendor "$VENDOR_DIR"

