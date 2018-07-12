export class SectionPage {
  public pageId: number | null = null;
  public layoutId: number | null = null;
  public content: any = null;
  public order: number | null = null;
  [key: string]: string | number | null;

  constructor(obj: SectionPageI) {
    Object.keys(obj).forEach((o: any) => {
      this[o] = obj && obj[o];
    })
  }
}

interface SectionPageI {
  pageId: number | null;
  layoutId: number | null;
  content: any;
  order: number | null;
  [key: number]: string | number | null;
}
