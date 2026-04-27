# Authense 貞操権侵害LP 実装ガイド

このリポジトリは、**Authense法律事務所 大阪オフィス**／**宇野 大輔 弁護士**向けの、WordPress本番運用前提LPです。

## ファイル構成
- `authense-uno-teisouken-lp.html`（分離版HTML）
- `authense-uno-teisouken-lp.css`（分離版CSS）
- `authense-uno-teisouken-lp.js`（分離版JS）
- `authense-uno-teisouken-lp-inline.html`（WordPress貼り付け本命）
- `image-prompts.md`（gpt-image-2.0向け画像生成プロンプト）

---

## 1. WordPress固定ページへの貼り付け手順
1. WordPress管理画面で固定ページを作成（例：`/teisouken/`）。
2. ブロックエディタで「カスタムHTML」ブロックを追加。
3. `authense-uno-teisouken-lp-inline.html` の内容を全文貼り付け。
4. プレビューで表示崩れがないか確認。
5. 公開（または下書き→社内確認）。

> 既存テーマ干渉を減らすため、スタイルは `.auth-lp` スコープで実装済み。

---

## 2. 画像アップロード手順
1. WordPressの「メディア > 新規追加」へ移動。
2. 下記画像をアップロード。
3. URLを控える。
4. HTML内の `src` を差し替える。

推奨アップロード先（例）
- `/wp-content/uploads/authense-uno-teisouken/fv-sp.webp`
- `/wp-content/uploads/authense-uno-teisouken/fv-pc.webp`
- `/wp-content/uploads/authense-uno-teisouken/worries.webp`
- `/wp-content/uploads/authense-uno-teisouken/evidence.webp`
- `/wp-content/uploads/authense-uno-teisouken/consult.webp`
- `/wp-content/uploads/authense-uno-teisouken/lawyer-uno.webp`

---

## 3. 画像URL差し替え手順
1. `authense-uno-teisouken-lp-inline.html` を開く。
2. `src="/wp-content/uploads/authense-uno-teisouken/` を検索。
3. WordPress実URLへ置換。
4. `alt` 文言が画像内容と一致しているか確認。

---

## 4. Contact Form 7差し替え手順
対象箇所：`<div class="auth-contact-form"> ... </div>`

### 現在
- 仮フォームHTMLを配置。

### 差し替え
1. Contact Form 7でフォーム作成。
2. ショートコードを取得。
3. `auth-contact-form` 内の仮フォームを削除し、以下に置換。

```html
<div class="auth-contact-form">
  [contact-form-7 id="xxxx" title="Authense 貞操権侵害LPフォーム"]
</div>
```

---

## 5. 社長修正対応表

| 指摘内容 | 修正する場所 | class名 | 対応方法 |
|---|---|---|---|
| FVコピーを変えたい | HERO | `.auth-hero-title` | HTML文言変更 |
| CTA色を変えたい | CSS変数 | `--auth-green-main` | 色コード変更 |
| バッジを変えたい | HERO badges | `.auth-pill-grid` | li追加/削除 |
| 画像を変えたい | 各section img | `img src` | 画像URL差し替え |
| 弁護士写真を変えたい | Lawyer section | `.auth-lawyer-img` | 画像URL差し替え |
| 電話番号を変えたい | 全CTA | `tel:0677773066` | 一括検索置換 |
| 事務所情報を変えたい | Office section | `.auth-office` | HTML文言変更 |
| フォームをCF7にしたい | Contact section | `.auth-contact-form` | shortcode差し替え |
| スマホ固定CTAを消したい | Sticky CTA | `.auth-sticky-cta` | `display:none` |

---

## 6. 公開前チェックリスト
- [ ] 事務所名が「Authense法律事務所 大阪オフィス」で統一されている
- [ ] 弁護士名が「宇野 大輔 弁護士」で統一されている
- [ ] 禁止表記（他事務所名・他弁護士名）が残っていない
- [ ] 電話リンクがすべて `tel:0677773066`
- [ ] フォーム送信先（CF7）が正しく動作
- [ ] スマホ固定CTAが表示される（PCでは非表示）
- [ ] FAQの開閉とJSON-LD内容が一致
- [ ] 画像の表示崩れ・404がない
- [ ] iPhone表示で横スクロールが出ない
- [ ] 法律広告表現が断定的すぎない

---

## 7. Authense事務所情報の確認箇所
- Header（事務所名・弁護士名）
- Office section（住所、TEL、FAX、受付時間、アクセス）
- Footer（事務所名・弁護士名・住所・TEL）

---

## 8. 弁護士写真差し替え箇所
- セクション：`data-section="lawyer-message"`
- クラス：`.auth-lawyer-img img`
- コメント：`<!-- 正式な弁護士写真に差し替え -->`

---

## 9. 電話番号リンク確認
検索対象：`tel:0677773066`

確認対象：
- ヘッダーCTA
- FV電話番号
- 最終CTA
- フッター
- スマホ固定CTA

---

## 10. スマホ表示確認手順
1. iPhone実機またはChrome DevToolsのiPhone表示を使用。
2. 375px / 390px / 428px幅で確認。
3. 確認ポイント：
   - 文字サイズ14px以上
   - CTA高さ44px以上
   - 横スクロールなし
   - 固定CTAのセーフエリア反映
   - FV順序が「コピー→画像→バッジ→CTA」になっている

---

## 推奨SEO情報
- **title**：既婚者だと知らずに交際していた方へ｜貞操権侵害・慰謝料請求の無料相談｜宇野 大輔弁護士・Authense法律事務所 大阪オフィス
- **description**：既婚者だと知らずに交際していた方へ。LINEや写真などの証拠確認、既婚確認、妻からの請求リスク、相手と会わずに進める方法まで、宇野 大輔弁護士が丁寧に確認します。Authense法律事務所 大阪オフィス。初回相談無料・秘密厳守・電話/Web対応。
- **h1**：彼が既婚者だった。慰謝料請求できる可能性があります。
- **構造化データ**：FAQPage JSON-LD（HTMLに実装済み）

---

## 監督レビュー（3視点）
- **批判的視点**：禁止表記の混入防止、法務断定表現の抑制、連絡先整合性を最優先。
- **デザイナー視点**：グリーン×ゴールド×アイボリーの上品トーン、余白・角丸・影を変数で統一。
- **ライター視点**：利益→不安→無料確認導線を各セクションで維持、CTA文言を具体化。
