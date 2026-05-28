#!/usr/bin/env python3
"""
Extract text from all PDF files in the workspace root and write .txt files.
"""
import os
import glob
import sys

try:
    from PyPDF2 import PdfReader
except Exception:
    print("PyPDF2 is required. Install with: pip install PyPDF2")
    raise

base_dir = os.path.abspath(os.path.join(os.path.dirname(__file__), '..'))
pdf_paths = glob.glob(os.path.join(base_dir, '*.pdf'))

if not pdf_paths:
    print('No PDF files found in', base_dir)
    sys.exit(1)

for pdf in pdf_paths:
    try:
        reader = PdfReader(pdf)
        texts = []
        for page in reader.pages:
            t = page.extract_text()
            if t:
                texts.append(t)
        out_text = '\n\n'.join(texts)
        out_path = os.path.splitext(pdf)[0] + '.txt'
        with open(out_path, 'w', encoding='utf-8') as f:
            f.write(out_text)
        print(f'Extracted: {pdf} -> {out_path} ({len(out_text)} chars)')
    except Exception as e:
        print(f'Error processing {pdf}: {e}')

print('Done.')
