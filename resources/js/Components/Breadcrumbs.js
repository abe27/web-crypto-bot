import { Breadcrumb, BreadcrumbItem, BreadcrumbLink } from '@chakra-ui/react'
import {ChevronRightIcon} from '@chakra-ui/icons'

const Breadcrumbs = ({breadcrumbs}) => {
  return (
    <Breadcrumb spacing="8px" separator={<ChevronRightIcon color="gray.500" />}>
      {breadcrumbs && breadcrumbs.map(i => (
        <BreadcrumbItem key={i.title} isCurrentPage={false}>
          <BreadcrumbLink href={route(i.url)}>{i.title}</BreadcrumbLink>
        </BreadcrumbItem>
      ))}
    </Breadcrumb>
  )
}

export default Breadcrumbs
