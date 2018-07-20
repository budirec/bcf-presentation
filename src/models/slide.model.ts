export class Slide {
  public slideId: number | null = null;
  public name: string | null = null;
  public createdAt: Date | null = null;
  public modifiedAt: Date | null = null;
  [key: string]: string | number | Date | null;

  constructor(obj: SlideI) {
    Object.keys(obj).forEach((o: any) => {
      this[o] = obj && obj[o] || null;
    })
  }
}

interface SlideI {
  slideId: number,
  name: string,
  createdAt: Date,
  modifiedAt: Date,
  [key: string]: string | number | Date | null;
}
