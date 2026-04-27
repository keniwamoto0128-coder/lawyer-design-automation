# LP画像生成プロンプト集（gpt-image-2.0）

> 方針：実在弁護士本人画像はAI生成しない。弁護士画像は正式写真を使用。
> 出力形式推奨：WebP（高品質）、sRGB、商用利用前提。文字・ロゴ・透かしなし。
> 必要に応じて「背景をグリーンバックで分離しやすく」と指定し、LP側で切り抜きや配置調整を行う。

---

## 1) ファーストビュー画像（スマホ優先）
- 用途: FV
- 推奨ファイル: `/wp-content/uploads/authense-uno-teisouken/fv-sp.webp` / `fv-pc.webp`
- サイズ: 1200x1600（縦）

**Prompt**
```text
A premium Japanese legal consultation LP hero image, 30s Japanese woman with short black bob hair, white blouse, elegant calm expression, emotionally hurt but trying to move forward. Keep right side occupied by woman and leave clean negative space on left for headline and CTA. Color palette: deep sage green, olive green, ivory, soft gold accents, soft beige. Lighting soft and natural, high trust and clean atmosphere, editorial quality, no text, no logo, no watermark, no brand marks, realistic photography style. Optional compositing-friendly background in muted green/ivory gradient.
```

---

## 2) 悩みチェック画像
- 用途: 悩みセクション
- 推奨ファイル: `/wp-content/uploads/authense-uno-teisouken/worries.webp`
- サイズ: 1200x900

**Prompt**
```text
Japanese woman indoors looking down at smartphone, subtle anxiety but not dramatic, calm and dignified mood. Interior palette with ivory and soft green, clean and refined legal consultation atmosphere, realistic photo style, no text, no logo, no watermark.
```

---

## 3) LINE・証拠診断画像
- 用途: 証拠診断セクション
- 推奨ファイル: `/wp-content/uploads/authense-uno-teisouken/evidence.webp`
- サイズ: 1200x900

**Prompt**
```text
Japanese woman checking smartphone message history, concerned but composed, legal consultation context, modern clean room, soft green and ivory tones. Smartphone screen should be abstract and generic, no identifiable app logos or trademarks, no text, no logo, no watermark, realistic photography.
```

---

## 4) 既婚確認画像
- 用途: 既婚確認セクション（必要に応じて差し替え）
- 推奨ファイル: `/wp-content/uploads/authense-uno-teisouken/marriage-check.webp`
- サイズ: 1200x900

**Prompt**
```text
Japanese woman thinking quietly by a window, preparing to consult a trusted legal professional, hopeful and calm expression, elegant and clean visual style, ivory and gentle green palette, no text, no logo, no watermark.
```

---

## 5) リスク対策画像
- 用途: 妻からの請求リスクセクション
- 推奨ファイル: `/wp-content/uploads/authense-uno-teisouken/risk.webp`
- サイズ: 1200x900

**Prompt**
```text
Japanese woman reviewing documents with concern but composed attitude, soft gold and green color accents, non-threatening tone, premium legal consultation mood, realistic photography, no text, no logo, no watermark.
```

---

## 6) 弁護士相談画像
- 用途: 相手と会わずに進める・メリット
- 推奨ファイル: `/wp-content/uploads/authense-uno-teisouken/consult.webp`
- サイズ: 1200x900

**Prompt**
```text
A calm legal consultation scene in Japan: woman speaking with lawyer in a clean consultation room, trustful and reassuring atmosphere. Lawyer shown from back or softly blurred for non-identifiable representation. Soft green, ivory, and beige palette, no text, no logo, no watermark, realistic photo style.
```

---

## 7) 弁護士紹介画像（AI生成禁止）
- 用途: 宇野 大輔弁護士紹介
- 推奨ファイル: `/wp-content/uploads/authense-uno-teisouken/lawyer-uno.webp`
- サイズ: 1200x900（または縦長実写真）

**運用メモ**
- 実写真を使用する。
- AIで実在弁護士風の架空人物は作らない。
- 一時対応はプレースホルダー画像＋HTMLコメント「正式な弁護士写真に差し替え」。

---

## 8) 最終CTA画像
- 用途: 最終CTA
- 推奨ファイル: `/wp-content/uploads/authense-uno-teisouken/final-cta.webp`
- サイズ: 1200x900

**Prompt**
```text
Japanese woman with a relieved and hopeful expression, subtle emotional recovery mood, clean and trustworthy legal consultation aesthetic, ivory and soft green background, premium yet gentle composition, no text, no logo, no watermark, realistic photo style.
```

---

## 画像生成後のチェック
1. 顔・手指の破綻がないか
2. 不自然な文字・ロゴ・透かしが混入していないか
3. 商標を想起させるUIがないか
4. LPのグリーン/アイボリー基調と合うか
5. WebP圧縮後も画質劣化が強くないか
